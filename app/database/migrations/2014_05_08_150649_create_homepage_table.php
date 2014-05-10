<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homepage', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 25);
			$table->string('last_name', 25);
			$table->string('email', 255);
			$table->string('phone', 14);
			$table->string('location', 255);
			$table->text('about');
			$table->string('headline', 255);
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
		Schema::drop('homepage');
	}

}
