<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//
// Auto-generated Migration Created: 2016-02-14 05:50:39
// ------------------------------------------------------------

class CreateTest1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up()
	{
		Schema::create('test1', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 12);
			$table->unsignedInteger('v')->unique();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	*/
	public function down()
	{
		Schema::drop('test1');
	}
}