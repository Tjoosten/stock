<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('customerNumber');
            $table->integer('country_id')->unsigned();
            $table->integer('partnership_id')->unsigned()->nullable();
			$table->string('name');
            $table->string('address');
            $table->string('housenumber');
            $table->string('busnumber');
            $table->string('postalcode');
            $table->string('city');
            $table->string('description');
            $table->string('btw');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
