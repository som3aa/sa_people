<?php

use Illuminate\Database\Migrations\Migration;

class MessagesSetupTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the conversations table
        Schema::create('conversations', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('supject');
            $table->timestamps();
        });

        // Creates the conversations_users (Many-to-Many relation) table
        Schema::create('conversation_user', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('conversation_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); // assumes a users table
            $table->foreign('conversation_id')->references('id')->on('conversations');
            $table->timestamp('conversation_last_view');

        });

        // Creates the messages table
        Schema::create('messages', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('conversation_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('text');
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
        Schema::drop('conversation_user');
        Schema::drop('conversations');
        Schema::drop('messages');
	}

}