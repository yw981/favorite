<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//
// Auto-generated Migration Created: 2016-02-14 05:51:28
// ------------------------------------------------------------

class CreatePasswordResetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up()
	{
		Schema::create('password_resets', function(Blueprint $table) {
			$table->string('email', 255);
			$table->string('token', 255);
			$table->timestamp('created_at');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	*/
	public function down()
	{
		Schema::drop('password_resets');
	}
}