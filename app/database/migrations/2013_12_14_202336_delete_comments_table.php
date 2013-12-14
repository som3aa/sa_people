<?php

use Illuminate\Database\Migrations\Migration;

class DeleteCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Delete the `Comments` table
		Schema::drop('comments');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Create the `Comments` table
		Schema::create('comments', function($table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('story_id')->unsigned();
			$table->text('content');
			$table->timestamps();
		});
	}

}