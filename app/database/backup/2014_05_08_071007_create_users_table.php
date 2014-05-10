<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($t) {
			$t->increments('id');
			$t->string('email', 255);
			$t->string('username', 25);
			$t->string('first_name', 25);
			$t->string('last_name', 25);
			$t->text('bio');
			$t->string('password', 60);
			$t->string('password_temp', 60);
			$t->string('code', 60);
			$t->boolean('active');
			$t->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
