<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder {

	public function run()
	{
        Country::create([
            'name'          =>  'Belgium',
            'country_code'  =>  'BE'
        ]);

        Country::create([
            'name'          =>  'Germany',
            'country_code'  =>  'DE'
        ]);

        Country::create([
            'name'          =>  'France',
            'country_code'  =>  'FR'
        ]);

        Country::create([
            'name'          =>  'Netherlands',
            'country_code'  =>  'NL'
        ]);

        Country::create([
            'name'          =>  'Italy',
            'country_code'  =>  'IT'
        ]);
	}

}