<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//
// Auto-generated Migration Created: 2016-02-14 05:51:28
// ------------------------------------------------------------

class CreateFavoritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up()
	{
		Schema::create('favorites', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('user_id')->unsigned();
			$table->string('url', 255);
			$table->string('title', 255);
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
		Schema::drop('favorites');
	}
}