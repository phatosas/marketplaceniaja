<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		Model::unguard();

		/*
		Because Books will be associated with Authors,
		we need to seed Authors first
		*/
		$this->call(StatesTableSeeder::class);
		$this->call(TypesTableSeeder::class);
		$this->call(ProductsTableSeeder::class);

		Model::reguard();
	}
}
