<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tickets',function($table){

			$table->increments('ticketno');			
			$table->integer('route_id');
			$table->integer('busid');
			$table->date('date');
			$table->float('amount');
			$table->float('discount');
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
		//
		Schema::drop('tickets');
	}

}