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

        // Truncate all data
        Category::truncate();
        Country::truncate();
        Customer::truncate();
        Eventlog::truncate();
        Product::truncate();
        Registration::truncate();
        Stock::truncate();
        Supplier::truncate();
        User::truncate();
        Partnership::truncate();

        // Seed All Data
		$this->call('UserTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('CustomersTableSeeder');
        $this->call('PartnershipsTableSeeder');
        /*$this->call('SuppliersTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('StocksTableSeeder');
        $this->call('RegistrationsTableSeeder');//*/
	}

}