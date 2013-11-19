<?php

use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the `profiles` table
		Schema::create('profiles',function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('name');
			$table->integer('gender');
			$table->string('location');
			$table->date('birthday');
            $table->string('avatar');
			$table->text('bio');
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
		// Delete the `profiles` table
		Schema::drop('profiles');
	}

}