<?php

class MessagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('conversations')->delete();
        DB::table('messages')->delete();

        // create the new conversation
        $conversation = new Conversation(array('supject' => 'See Line Jeurny'));

        // attach users to coversations & save
        User::find(1)->conversations()->save($conversation);

        // create the messages
        $message = new Message;
        $message->user_id = User::find(1)->id;
        $message->text = 'yala ya shabab shedo al hima';

        $message1 = new Message;
        $message1->user_id = User::find(2)->id;
        $message1->text = 'جدا جدا ';

        // save the message
        $conversation->messages()->save($message);
        $conversation->messages()->save($message1);
    }

}
