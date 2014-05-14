<?php

class PartnershipsTableSeeder extends Seeder {

	public function run()
	{
        Partnership::create([
            'name'  =>  'n.v.',
        ]);

        Partnership::create([
            'name'  =>  'b.v.',
        ]);

        Partnership::create([
            'name'  =>  'b.v.b.a.',
        ]);

        Partnership::create([
            'name'  =>  's.a.',
        ]);

        Partnership::create([
            'name'  =>  's.p.r.l.',
        ]);

        Partnership::create([
            'name'  =>  'Ltd.',
        ]);
	}

}