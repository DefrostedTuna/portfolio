<?php
class AccountController extends BaseController {

	public function getLogIn() {
		return View::make('account.login');
	}

	public function postLogIn() {
		$validator = Validator::make(Input::all(), 
			array(
				'email' 	=> 'required|email',
				'password' 	=> 'required'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('account-log-in')
					->withErrors($validator)
					->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password'),
				'active' 	=> 1
			), $remember);

			if ($auth) {
				//Redirect to intended page
				return 	Redirect::intended('/')
						->with('global', 'You have been logged in as ' . Auth::user()->username . '!')
						->with('alert', 'success');
			} else {
				return Redirect::route('account-log-in')
						->with('global', 'The email or password were incorrect.')
						->with('alert', 'danger');
			}
		}

		return Redirect::route('account-log-in')
				->with('global', 'There was a problem logging you in.')
				->with('alert', 'danger');

	}

	public function getLogOut() {
		Auth::logout();
		return Redirect::route('home');
	}


	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {

		$validator = Validator::make(Input::all(), 
			array(
				'email' 			=> 'required|max:128|email|unique:users',
				'username'			=> 'required|max:25|min:3|unique:users',
				'password'			=> 'required|min:6',
				'confirm_password'	=> 'required|same:password'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		} else {
			//create account
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			//Activation code
			$code 		= str_random(60);

			$user = User::create(array(
				'email' 	=> $email,
				'username' 	=> $username,
				'password' 	=> Hash::make($password),
				'code' 		=> $code,
				'active' 	=> 0
			));

			if ($user) {

				Mail::send('emails.auth.activate', array(
													'link' => URL::route('account-activate', $code), 
													'username' => $username), 
							function($message) use ($user) {
								$message->to($user->email, $user->username)->subject('Activate your account');
				});

				return Redirect::route('home')
				->with('global', 'Your account has been created! We have sent you an activation email, please check your inbox shortly.')
				->with('alert', 'success');
			}
		}
	}

	public function getDelete($id) {

		//find user in database to compare id with current user
		$user = User::find($id);

		//check whether delete request is for current user
		if($user->id !== Auth::user()->id) {

			//if request is not for current user, delete user requested
			if($user->delete()) {

				return 	Redirect::route('users-edit')
						->with('global', 'User successfully removed')
						->with('alert', 'success');
			} else {

			//if requested user wasnt deleted, return redirect with error	
			return 	Redirect::route('users-edit')
					->with('global', 'There was a problem finding and deleting the user')
					->with('alert', 'danger');
				}
		} elseif($user->id === Auth::user()->id) {
		
		//if requested user was the current user, deny deletion	
			return 	Redirect::route('users-edit')
				->with('global', 'You cannot delete your own account from here')
				->with('alert', 'danger');
		}

		//fallback error if neither contion makes it through
		return 	Redirect::route('users-edit')
				->with('global', 'There was a problem with Auth::check()')
				->with('alert', 'danger');

	}

	public function getActivate($code) {
		$user = User::where('code', '=', $code)
					->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			//Update user to active state
			$user->active 	= 1;
			$user->code 	= '';

			if ($user->save()) {
				return 	Redirect::route('home')
						->with('global', 'Activated! You can now log in!')
						->with('alert', 'success');
			}

		}

		return Redirect::route('home')
				->with('global', 'We could not activate your account, please try again later.')
				->with('alert', 'caution');
	}

	public function getChangePassword() {
		return View::make('account.password');
	}

	public function postChangePassword() {
		$validator = Validator::make(Input::all(), 
			array(
				'current_password' => 'required',
				'new_password' => 'required|min:6',
				'confirm_new_password' => 'required|same:new_password'
			)
		);

		if($validator->fails()) {
			return 	Redirect::route('account-change-password')
					->withErrors($validator);
		} else {

			$user 				= User::find(Auth::user()->id);

			$current_password 	= Input::get('current_password');
			$new_password 		= Input::get('new_password');

			if (Hash::check($current_password, $user->getAuthPassword())) {
				$user->password = Hash::make($new_password);

				if ($user->save()) {
					return 	Redirect::route('home')
							->with('global', 'Your password has been changed')
							->with('alert', 'success');
				}
			} else {
				return 	Redirect::route('account-change-password')
						->with('global', 'Current password was incorrect.')
						->with('alert', 'danger');
			}
		}

		return 	Redirect::route('account-change-password')
				->with('global', 'Your password could not be changed.')
				->with('alert', 'danger');


	}

	public function getForgotPassword() {
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|email'
			)
		);

		if ($validator->fails()) {
			return 	Redirect::route('account-forgot-password')
					->withErrors($validator)
					->withInput();
		} else {
			
			$user = User::where('email', '=', Input::get('email'));			
			
			if ($user->count()) {
				$user 					= $user->first();

				//generate random code and password
				$code 					= str_random(60);
				$password 				= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password);

				if ($user->save()) {
					
					Mail::send('emails.auth.forgot', array(
														'link' => URL::route('account-recover', $code),
														'username' => $user->username, 'password' => $password),
								function($message) use($user) {
									$message->to($user->email, $user->username)->subject('Your new password');
					});

					return 	Redirect::route('home')
							->with('global', 'We have sent an email containing a new password, please check your inbox shortly and follow the link to activate it.')
							->with('alert', 'success');
				}
			}

		}

		return 	Redirect::route('account-forgot-password')
				->with('global', 'There was a problem requesting a new password, please try again later.')
				->with('alert', 'danger');
	}

	public function getRecover($code) {
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', '');

		if ($user->count()) {
			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if ($user->save()) {
				return 	Redirect::route('home')
						->with('global', 'You can now log in with your new password.');
			} else {
				return 	Redirect::route('home')
						->with('global', 'There was a problem recovering your password.')
						->with('alert', 'danger');
			}
		}

		return 	Redirect::route('home')
				->with('global', 'Could not recover your account')
				->with('alert', 'danger');
	}

	public function getEditUsers() {
		return 	View::make('admin.users')
				->with('users', User::all());
	}

	public function getEditUser($id) {
		return View::make('admin.users.edit')
				->with('user', User::findOrFail($id));
	}

	public function postEditUser($id) {

		$validator = Validator::make(Input::all(), array(
			'first_name' 	=> 'required|min:2|max:25',
			'last_name' 	=> 'required|min:2|max:25',
			'bio' 		 	=> 'min:3|max:3000'
		));

		if($validator->fails()) {

			return 	Redirect::route('users-edit-single', $id)
					->withErrors($validator);
		} else {

			$user = User::where('id', '=', $id)
							->update(array(
					'first_name' => Input::get('first_name'),
					'last_name'=> Input::get('last_name'),
					'bio' => Input::get('bio')

			));

			if($user) {

				return 	Redirect::route('users-edit')
						->with('global', 'User info updated!')
						->with('alert', 'success');
			} else {

				return 	Redirect::route('users-edit')
						->with('global', 'There was a problem updating the user')
						->with('alert', 'danger');
			}

		}

		return 	Redirect::route('admin-dashboard')
				->with('global', 'There was an error processing the request. Please try again later')
				->with('alert', 'danger'); 
	}

}