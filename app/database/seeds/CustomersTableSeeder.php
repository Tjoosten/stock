<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('nl_BE');

        Customer::create([
            'name'          =>  'Codivex BVBA',
            'address'       =>  'Vlimmersebaan',
            'housenumber'   =>  '136',
            'busnumber'     =>  'Unit 2',
            'postalcode'    =>  '2275',
            'city'          =>  'Wechelderzande',
            'country_id'    =>  1,
            'description'   =>  '',
            'btw'           =>  ''
        ]);

        /*
		foreach(range(1, 5) as $index)
		{
			Customer::create([
                'name'          =>  $faker->company,
                'address'       =>  $faker->address,
                'housenumber'   =>  $faker->buildingNumber,
                'busnumber'     =>  $faker->randomLetter,
                'postalcode'    =>  $faker->postcode,
                'city'          =>  $faker->city,
                'country_id'    =>  $faker->randomNumber(1, 4),
                'description'   =>  $faker->text(100),
                'btw'           =>  $faker->creditCardNumber
			]);
		}//*/
	}

}