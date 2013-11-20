<?php

class CommentsTableSeeder extends Seeder {

    protected $content1 = ' كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما';
    protected $content2 = ' كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما  كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما';
    protected $content3 = ' كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشما';


    public function run()
    {
        DB::table('comments')->delete();

        $user_id = User::first()->id;
        $story_id = Story::first()->id;

        DB::table('comments')->insert( array(
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id,
                'content'    => $this->content2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id,
                'content'    => $this->content3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id+1,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id+1,
                'content'    => $this->content2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'story_id'    => $story_id+2,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ))
        );
    }

}
