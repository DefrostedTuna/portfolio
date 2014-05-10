<?php
Route::get('/', array(
	'as' 	=> 'home',
	'uses' 	=> 'HomeController@home'
));

Route::get('/about', array(
	'as' 	=> 'about',
	'uses' 	=> 'HomeController@about'
));

/*
| User profiles
*/
Route::get('/user/{username}', array(
	'as' 	=> 'profile-user',
	'uses'	=> 'ProfileController@user'
));


Route::get('/projects', array(
	'as' 	=> 'projects',
	'uses' 	=> 'ProjectController@all'
));

/*Route::get('/projects/recent', array(
	'as' 	=> 'projects-recent',
	'uses' 	=> 'ProjectController@recent'
));

Route::get('/projects/featured', array(
	'as' 	=> 'projects-featured',
	'uses' 	=> 'ProjectController@featured'
));

Route::get('/projects/type/{type}', array(
	'as' 	=> 'projects-type',
	'uses' 	=> 'ProjectController@type'
));*/

Route::get('/project/{slug}', array(
	'as' 	=> 'projects-slug',
	'uses' 	=> 'ProjectController@slug'
));


/*--------------------
| Authenticated group
|---------------------
*/
Route::group(array('before' => 'auth'), function() {

	/*----------------------
	| CSRF protection group
	|-----------------------
	*/
	Route::group(array('before' => 'csrf'), function() {

		/*
		| Create account (POST)
		*/
		Route::post('/account/create', array(
			'as' 	=> 'account-create',
			'uses' 	=> 'AccountController@postCreate'
		));

		/*
		| Change password (POST)
		*/
		Route::post('account/change-password', array(
			'as' 	=> 'account-change-password',
			'uses' 	=> 'AccountController@postChangePassword'
		));

		/*
		| Edit users single (POST)
		*/
		Route::post('/admin/users/edit/{id}', array(
				'as' 	=> 'users-edit-single',
				'uses' 	=> 'AccountController@postEditUser'
		));

		/*
		| Create project (POST)
		*/
		Route::post('admin/projects/create', array(
			'as' 	=> 'projects-create',
			'uses' 	=> 'ProjectController@postCreate'

		));

		/*
		| Update project (POST)
		*/
		Route::post('/admin/projects/edit/{projectId}', array(
			'as' 	=> 'projects-update',
			'uses' 	=> 'ProjectController@postEditProject'
		));

		/*
		| Update project quick (POST)
		*/	
		Route::post('/admin/projects', array(
			'as' 	=> 'projects-quick-update',
			'uses' 	=> 'ProjectController@postEditProjectQuick'
		));	

		/*
		| Edit Homepage (POST)
		*/

		Route::post('/admin/homepage/edit', array(
				'as' 	=> 'homepage-edit',
				'uses' 	=> 'HomeController@postEditHome'
		));



	}); 
	/*- CSRF protection group (Auth)------------------------------------*/

	/*
	| Create project (GET)
	*/
	Route::get('admin/projects/create', array(
		'as' 	=> 'projects-create',
		'uses' 	=> 'ProjectController@getCreate'

	));

	/*
	| Create account (GET) ----------------------------------|||||
	*/
	Route::get('/account/create', array(
		'as' 	=> 'account-create',
		'uses' 	=> 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
			'as' 	=> 'account-activate',
			'uses' 	=> 'AccountController@getActivate'
	));

	/*
	| Change password (GET)
	*/
	Route::get('/account/change-password', array(
		'as' 	=> 'account-change-password',
		'uses' 	=> 'AccountController@getChangePassword'
	));

	/*
	| Edit users (GET)
	*/
	Route::get('/admin/users', array(
			'as' 	=> 'users-edit',
			'uses' 	=> 'AdminController@getAdminViewUsers'
	));

	/*
	| Edit users single (GET)
	*/
	Route::get('/admin/users/edit/{id}', array(
			'as' 	=> 'users-edit-single',
			'uses' 	=> 'AccountController@getEditUser'
	));


	/*
	| Delete user (GET)
	*/
	Route::get('/admin/users/delete/{id}', array(
			'as' 	=> 'users-delete',
			'uses' 	=> 'AccountController@getDelete'
	));

	/*
	| Admin view projects (GET)
	*/
	Route::get('/admin/projects', array(
			'as' 	=> 'projects-edit',
			'uses' 	=> 'AdminController@getAdminViewProjects'
	));

	/*
	| Edit Homepage (GET)
	*/

	Route::get('/admin/homepage/edit', array(
			'as' 	=> 'homepage-edit',
			'uses' 	=> 'HomeController@getEditHome'
	));


	/*
	| Edit project (GET)
	*/
	Route::get('/admin/projects/edit/{projectId}', array(
			'as' 	=> 'projects-edit-single',
			'uses' 	=> 'ProjectController@getEditProject'
	));

	/*
	| Delete project (GET)
	*/
	Route::get('/admin/projects/delete/{projectId}', array(
		'as' 	=> 'projects-delete',
		'uses' 	=> 'ProjectController@getDeleteProject'
	));


	/*
	| Log out (GET)
	*/
	Route::get('/account/log-out', array(
		'as' 	=> 'account-log-out',
		'uses' 	=> 'AccountController@getLogOut'
	));

	/*
	| Admin dashboard ------------------------------------------
	*/

	Route::get('/admin', array(
			'as' 	=> 'admin-dashboard',
			'uses' 	=> 'AdminController@dashboard'
	));

});
/*- Authenticated group ------------------------------------------------*/

/*----------------------
| Unauthenticated group
|-----------------------
*/
Route::group(array('before' => 'guest'), function() {

	/*----------------------
	| CSRF protection group
	|-----------------------
	*/
	Route::group(array('before' => 'csrf'), function() { 
		
		/*
		| Log in (POST)
		*/
		Route::post('/account/log-in', array(
			'as' 	=> 'account-log-in',
			'uses' 	=> 'AccountController@postLogIn'
		));

		/*
		| Forgot password (POST)
		*/
		Route::post('/account/forgot-password', array(
			'as' 	=>'account-forgot-password',
			'uses' 	=> 'AccountController@postForgotPassword'
		));

	});
	/*- CSRF protection group (Unauth)----------------------------------*
	

	/*
	| Forgot password (GET)
	*/
	Route::get('/account/forgot-password', array(
		'as' 	=>'account-forgot-password',
		'uses' 	=> 'AccountController@getForgotPassword'
	));

	Route::get('/account/recover/{code}', array(
		'as' 	=> 'account-recover',
		'uses' 	=> 'AccountController@getRecover'
	));

	/*
	| Log in (GET)
	*/
	Route::get('/account/log-in', array(
		'as' 	=> 'account-log-in',
		'uses' 	=> 'AccountController@getLogIn'
	));

});
/*- Unauthenticated group -----------------------------------------------*/