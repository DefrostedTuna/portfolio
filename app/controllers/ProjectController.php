<?php

class ProjectController extends BaseController {

	public function all() {

		return 	View::make('projects.projects')
				->with('projects', Project::getByAll()); //Project::all();

	}

	public function recent() {
		return 	View::make('projects.projects')
				->with('projects', Project::getByRecent());
	}

	public function featured() {
		//returns projects based on whether a "featured"
		//field is active or not in database

		return 	View::make('projects.projects')
				->with('projects', Project::getByFeatured());
}

	public function type($type) {
		//retrns projects based on the type of they are
		//such as "CMS" or "eCommerce", etc
		return 	View::make('projects.projects')
				->with('projects', Project::getByType($type));

	}

	public function slug($slug) {
		//return a project based on the url slug stored in database
		return 	View::make('projects.slug')
				->with('project', Project::getBySlug($slug));
	}

	public function getCreate() {
		//return View::make for creating a new project
		return View::make('admin.projects.create');
	}

	public function postCreate() {

		$validator = Validator::make(Input::all(), array(
			'name' 		=> 'required|unique:projects|min:4',
			'link' 		=> 'url',
			'body' 		=> 'required',
			'image' 	=> 'image',
		));

		if ($validator->fails()) {
			return 	Redirect::route('projects-create')
					->withErrors($validator)
					->withInput();
		} else {

			$name 		= Input::get('name');
			$link 		= Input::get('link');
			$slug		= Str::slug(Input::get('name'));

			$body 		= Input::get('body');
			$show 		= Input::get('show');
			$featured 	= Input::get('featured');

			$publicPath 	= '';
			$filename 		= '';

			if(Input::hasFile('image')) {

				$file 			= Input::file('image'); 
				$publicPath 	= '/portfolio/' . $slug. '-' . str_random(6) . '/img/';
				$fullPath		= public_path() . $publicPath;
				$ext 			= explode(".", $file->getClientOriginalName());
				$ext 			= strtolower(end($ext));
				$filename 		= 'cover.' . $ext;
				$uploaded 		= $file->move($fullPath, $filename);
					
			}

			$project = Project::create(array(
				'name' 			=> $name,
				'link' 			=> $link,
				'images'		=> $publicPath . $filename,
				'description' 	=> $body,
				'show' 			=> $show,
				'featured' 		=> $featured,

			));

			if($project) {
				return Redirect::route('admin-dashboard')
					->with('global', 'Project has been created!')
					->with('alert', 'success');
			}
		}
	}

	public function getEditProject($projectId) {
		//return view for editing projects
		return 	View::make('admin.projects.edit')
				->with('project', Project::find($projectId));
	}

	public function postEditProject($projectId) {

		$validator = Validator::make(Input::all(), array(
			'name' 		=> 'required|min:4',
			'link' 		=> 'url',
			'body' 		=> 'required',
			'image' 	=> 'image',
		));

		if ($validator->fails()) {
			return 	Redirect::route('projects-edit-single', array($projectId))
					->withErrors($validator)
					->withInput();
		} else {

			$name 		= Input::get('name');
			$link 		= Input::get('link');
			$slug		= Str::slug(Input::get('name'));
			$body 		= Input::get('body');
			$show 		= Input::get('show');
			$featured 	= Input::get('featured');

			$filename 		= '';
			$currentImg 	= '';
			$publicPath 	= '';

			//instantiate selected project to determine if it has an image or not
			$project = Project::findOrFail($projectId);

			//pull the image directory from the database
			if($project->images) {
				
				//if found, explode the data into an array to leave only the dir structure
				$fullDir = explode("/", $project->images);

				//grab the filename if it has an image
				$currentImg = end($fullDir);

				//assemble dir without image appended
				$publicPath = array($fullDir[0], $fullDir[1], $fullDir[2]);
				$publicPath = implode('/', $publicPath) . '/img/';

			}

			if(Input::hasFile('image')) {

				if(!$project->images) {
				
					$publicPath 	= '/portfolio/' . $slug. '-' . str_random(6) . '/img/';	
				}

				//gather variables to use in registering an image
				$file 			= Input::file('image'); 
				$fullPath		= public_path() . $publicPath;
				$ext 			= explode(".", $file->getClientOriginalName());
				$ext 			= strtolower(end($ext));
				$filename 		= 'cover.' . $ext;
				$uploaded 		= $file->move($fullPath, $filename);
					
			} else {
				$filename = $currentImg;
			}

			$update = Project::where('id', '=', $projectId)
								->update(array(
				'name' 			=> $name,
				'link' 			=> $link,
				'images' 		=> $publicPath . $filename,
				'description' 	=> $body,
				'show' 			=> $show,
				'featured' 		=> $featured,

			));

			if($update) {
				return Redirect::route('projects-edit')
					->with('global', 'Project has been updated!')
					->with('alert', 'success');
			}
		}
	}

	public function postEditProjectQuick() {

		$id = Input::get('id');
		$project = Project::findOrFail($id);

		$featured 	= (Input::get('featured') ? true : false);
		$show 		= (Input::get('show') ? true : false);

		$update = Project::where('id', '=', $id)
							->update(array(
			'featured' 		=> $featured,
			'show' 			=> $show,

		));
		
		if($update) {
			return Redirect::route('projects-edit', '#' . $project->slug);
		}


	}

	public function getDeleteProject($projectId) {
		//prep project for deletion
		$project = Project::where('id', '=', $projectId);
		
		//return the project as an object to pull dir attribute
		$file = Project::find($projectId);

		/*
		| Remove files ------------------------------------------------------------------------------
		*/
			//check to see if there are any images stored for selected item
			if($file->images) {

				//find base dir to remove it later
				$fullDir = explode("/", $file->images);

				//assemble dir without image appended
				$baseDir = array($fullDir[0], $fullDir[1], $fullDir[2]);
				$baseDir = implode('/', $baseDir);

				//if the image exists, delete it and the containing folders
				if(file_exists(public_path() . $file->images)) {
				unlink(public_path() . $file->images);

				//remove image path and base path
				rmdir(public_path() . $baseDir . '/img/');
				rmdir(public_path() . $baseDir . '/');

				}

				//if image is deleted somehow and dir still exists, delete paths to clean up
				if(is_dir(public_path() . $baseDir . '/')) {

					//if img subfolder is present
					if(is_dir(public_path() . $baseDir . '/img/')){

						//remove img subfolder
						rmdir(public_path() . $baseDir . '/img/');	
					}
					//remove base path
					rmdir(public_path() . $baseDir . '/');	
				}
			}

		/*-----------------------------------------------------------------------------------------*/

		//delete project
		if($project->delete()) {

			return 	Redirect::route('projects-edit')
					->with('global', 'Project has been removed!')
					->with('alert', 'success');
		}

		//fallback error
		return 	Redirect::route('projects-edit')
				->with('global', 'There was a problem removing the project')
				->with('alert', 'danger');
	}



}