<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('product_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('warranty');
            $table->string('serialNumber');
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
		Schema::drop('stocks');
	}

}
