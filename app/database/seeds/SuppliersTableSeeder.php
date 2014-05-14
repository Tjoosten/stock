<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SuppliersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('nl_BE');

        foreach(range(1, 4) as $index)
        {
            Supplier::create([
                'name'          =>  $faker->company,
                'address'       =>  $faker->address,
                'city'          =>  $faker->city,
                'postal_code'   =>  $faker->postcode,
                'country_id'       =>  1
            ]);
        }
    }

}