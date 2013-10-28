<?php
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the `Stories` table
		Schema::create('stories',function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('title');
			$table->string('slug');
			$table->text('content');
            $table->string('image');
            $table->boolean('status')->default(0);
			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_keywords');
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
		// Delete the `Stories` table
		Schema::drop('stories');
	}

}