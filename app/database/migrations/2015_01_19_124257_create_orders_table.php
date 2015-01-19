<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('order_id')->unique();
			$table->decimal('total');
			$table->integer('status')->unsigned();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->integer('card')->unsigned();
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
		Schema::drop('orders');
	}

}
