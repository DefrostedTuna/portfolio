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
		Schema::create('projects', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('name', 50);
			$table->string('link', 2083);
			$table->string('slug', 50);
			$table->text('images');
			$table->text('description');
			$table->boolean('featured');
			$table->boolean('show');
			$table->string('type', 25);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
