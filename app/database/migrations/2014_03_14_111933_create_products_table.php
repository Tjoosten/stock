<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('supplier_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('name');
			$table->string('itemNumber');
			$table->integer('defaultWarranty');
            $table->integer('tariffCode');
			$table->timestamps();

            //$table->unique(['supplier_id', 'itemNumber']);
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('products');
	}

}
