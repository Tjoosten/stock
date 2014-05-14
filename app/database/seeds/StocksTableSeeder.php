<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StocksTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('nl_BE');

		foreach(range(1, 10) as $index)
		{
			Stock::create([
                'product_id'    =>  $faker->randomNumber(1, 4),
                'supplier_id'   =>  $faker->randomNumber(1, 4),
                'customer_id'   =>  $faker->randomNumber(1, 10),
                'warranty'      =>  $faker->randomNumber(0, 5),
                'serialNumber'  =>  $faker->md5
			]);
		}
	}

}