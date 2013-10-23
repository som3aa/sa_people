<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		// Add calls to Seeders here
		$this->call('StoriesTableSeeder');
		$this->call('CategoriesTableSeeder');

	}

}