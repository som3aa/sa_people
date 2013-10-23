<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(array(
            array(
                'name'      => 'أدباء و كتـاب',
                'slug'       => 'أدباء-كتـاب',
            ),
            array(
                'name'      => 'شعراء',
                'slug'       => 'شعراء',
            ),
            array(
                'name'      => 'مغنون',
                'slug'       => 'مغنون',
            ),
            array(
                'name'      => 'موسيقيون',
                'slug'       => 'موسيقيون',
            ),
            array(
                'name'      => 'تشكيليون',
                'slug'       => 'تشكيليون',
            ),
            array(
                'name'      => 'دراميون',
                'slug'       => 'دراميون',
            ),
            array(
                'name'      => 'أطباء',
                'slug'       => 'أطباء',
            ),
            array(
                'name'      => 'علماء',
                'slug'       => 'علماء',
            ))
        );
    }

}
