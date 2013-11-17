<?php

class ProfilesTableSeeder extends Seeder {

    protected $bio = 'لإكمال دراسته فحصل من جامعتها على درجة البكالوريوس في العلوم. سافر إلى إنجلترا حيث واصل دراسته، وغيّر تخصصه إلى دراسة الشؤون الدولية السياسية';

    public function run()
    {
        DB::table('profiles')->delete();

        DB::table('profiles')->insert( array(
            array(
                'user_id'        => 1,
                'name'      => 'محمد عادل',
                'location'       => 'الخرطوم - السودان',
                'birthday'    => new DateTime('1979-03-14'),
                'avatar'    => '',
                'bio'    => $this->bio,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => 2,
                'name'      => 'lina ali',
                'location'       => 'Doha - Qatar',
                'birthday'    => new DateTime,
                'avatar'    => 'http://placehold.it/400x400',
                'bio'    => $this->bio,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
