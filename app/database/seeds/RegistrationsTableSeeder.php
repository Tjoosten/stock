<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RegistrationsTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('nl_BE');

		/*foreach(range(1, 10) as $index)
		{
			Registration::create([

			]);
		}//*/
	}

}