<?php

class HomeController extends BaseController {
	
	public function home() {

		return 	View::make('home')
				->with('projects', Project::getByFeatured())
				->with('homepage', Homepage::find(1));
	}

	public function about() {

		return 	View::make('about')
				->with('homepage', Homepage::find(1));
	}

	public function getEditHome() {
		return 	View::make('admin.homepage.edit')
				->with('homepage', Homepage::find(1));
	}

	public function postEditHome() {
		$validator = Validator::make(Input::all(), array(
			'about' 		=> 'required',
			'first_name' 	=> 'required',
			'last_name' 	=> 'required',
			'email' 		=> 'email',
			'phone'			=> 'min:10|max:15',
			'location'		=> 'required|min:3',
			'headline' 		=> 'min:3|max:50'
			));

		if($validator->fails()) {
			return Redirect::route('homepage-edit')
					->withErrors($validator)
					->withInput();
		} else {

			$homepage = 	Homepage::where('id', '=', '1')
									->update(array(
				'about' 		=> Input::get('about'),
				'first_name' 	=> Input::get('first_name'),
				'last_name' 	=> Input::get('last_name'),
				'email' 		=> Input::get('email'),
				'phone'			=> Input::get('phone'),
				'location'		=> Input::get('location'),
				'headline'		=> Input::get('headline')
			));

			if($homepage) {
				return 	Redirect::route('admin-dashboard')
						->with('global', 'Homepage has been updated.')
						->with('alert', 'success');
			}
		}

		return 	Redirect::route('admin-dashboard')
				->with('global', 'There was a problem updating the homepage.')
				->with('alert', 'danger');
	}

}