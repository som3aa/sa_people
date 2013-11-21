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
            ),
            array(
                'name'      => 'سياسيون',
                'slug'       => 'سياسيون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'عسكريون',
                'slug'       => 'عسكريون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'رياضيون',
                'slug'       => 'رياضيون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'إقتصاديون',
                'slug'       => 'إقتصاديون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'رجال أعمال',
                'slug'       => 'رجال-أعمال',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'أكاديميون',
                'slug'       => 'أكاديميون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'مؤرخون',
                'slug'       => 'مؤرخون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'صحفيون',
                'slug'       => 'صحفيون',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'نقاد',
                'slug'       => 'نقاد',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'شخصيات تاريخية',
                'slug'       => 'شخصيات-تاريخية',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
        ));
    }

}
