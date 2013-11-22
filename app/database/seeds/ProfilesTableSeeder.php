<?php

class ProfilesTableSeeder extends Seeder {

    protected $bio = 'لإكمال دراسته فحصل من جامعتها على درجة البكالوريوس في العلوم. سافر إلى إنجلترا حيث واصل دراسته، وغيّر تخصصه إلى دراسة الشؤون الدولية السياسية';

    public function run()
    {
        DB::table('profiles')->delete();

        DB::table('profiles')->insert( array(
            array(
                'user_id'        => 1,
                'name'      => 'مدير',
                'location'       => 'قطر - الدوحة',
                'birthday'    => new DateTime('1991-10-01'),
                'avatar'    => '',
                'bio'    => $this->bio,
                'gender'    => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => 2,
                'name'      => 'مراجع',
                'location'       => 'Doha - Qatar',
                'birthday'    => new DateTime,
                'avatar'    => 'http://placehold.it/400x400',
                'bio'    => $this->bio,
                'gender'    => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => 3,
                'name'      => 'تجريبي',
                'location'       => 'Doha - Qatar',
                'birthday'    => new DateTime,
                'avatar'    => 'http://placehold.it/400x400',
                'bio'    => $this->bio,
                'gender'    => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
