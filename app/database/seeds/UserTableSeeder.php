<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        //$faker = Faker::create('nl_BE');

        User::create([
            'name'      =>  'Dens',
            'prename'   =>  'Sascha',
            'username'  =>  'sascha',
            'password'  =>  'abc123!'
        ]);
    }

}