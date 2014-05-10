<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($t) {
			$t->increments('id');
			$t->string('name', 50);
			$t->string('link', 2083);
			$t->string('slug', 50);
			$t->text('images');
			$t->text('description');
			$t->boolean('featured');
			$t->boolean('show');
			$t->string('type', 25);
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::Drop('projects');
	}

}
