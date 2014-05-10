<?php

class AdminController extends BaseController {

	public function Dashboard() {
		return 	View::make('admin.dashboard');
	}

	public function getAdminViewProjects() {

		return 	View::make('admin.projects.view')
				->with('projects', Project::orderBy('created_at', 'desc')->get());
	}

	public function getAdminViewUsers() {
		return 	View::make('admin.users.view')
				->with('users', User::all());
	}
}