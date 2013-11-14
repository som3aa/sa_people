<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(array(
            array(
                'name'      => 'أدباء و كتـاب',
                'slug'       => 'أدباء-كتـاب',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'شعراء',
                'slug'       => 'شعراء',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'مغنون',
                'slug'       => 'مغنون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'موسيقيون',
                'slug'       => 'موسيقيون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'تشكيليون',
                'slug'       => 'تشكيليون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'دراميون',
                'slug'       => 'دراميون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'أطباء',
                'slug'       => 'أطباء',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'علماء',
                'slug'       => 'علماء',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
