<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Project extends Eloquent implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

	protected $fillable = array("name", "link", "slug", "images", "description", "type", "featured");

	public static function getByAll($sortBy = 'created_at', $direction = 'desc') {
		return 	DB::table('projects')
				->where('show', '=', 1)
				->orderBy($sortBy, $direction)
				->get();
	}

	public static function getByRecent($take = 3, $sortBy = 'created_at', $direction = 'desc') {
		return 	DB::table('projects')
				->where('show', '=', 1)
				->take($take)
				->orderBy($sortBy, $direction)
				->get();	
}

	public static function getByFeatured($sortBy = 'created_at', $direction = 'desc') {
		return 	DB::table('projects')
				->where('featured', '=', true)
				->where('show', '=', 1)
				->orderBy($sortBy, $direction)
				->get();
	}

	public static function getByType($type, $sortBy = 'created_at', $direction = 'desc') {
		return 	DB::table('projects')
				->where('type', '=', $type)
				->where('show', '=', 1)
				->orderBy($sortBy, $direction)
				->get();
	}

	public static function getBySlug($slug) {
		return 	DB::table('projects')
				->where('slug', '=', $slug)
				->first();
	}
}