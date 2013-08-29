<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('seats',function($table){

			$table->increments('seatid');
			$table->string('seatno');
			$table->integer('ticketno');			
			$table->integer('busid');

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

	Schema::drop('seats');
	}

}