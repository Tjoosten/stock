<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('nl_BE');

        foreach(range(1, 8) as $index)
        {
            Product::create([
                'supplier_id'       => $faker->randomNumber(1, 4),
                'name'              => "Product-" . $faker->randomDigit(),
                'itemNumber'        => $faker->randomNumber(6000, 9000),
                'defaultWarranty'   => $faker->randomNumber(0, 4)
            ]);
        }
    }

}