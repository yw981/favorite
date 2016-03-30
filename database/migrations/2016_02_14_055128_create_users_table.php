<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//
// Auto-generated Migration Created: 2016-02-14 05:51:28
// ------------------------------------------------------------

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->string('remember_token', 100)->nullable();
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
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