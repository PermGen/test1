<?php

use Illuminate\Database\Migrations\Migration;

class CreateCancelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancels',function($table){

		$table->increments('cancelid');
		$table->integer('busid');
		$table->integer('user_id');
		$table->datetime('time');
		$table->string('seatno');
		$table->integer('ticketno');
		$table->float('refamount');
		$table->enum('reason',array('CANCELLED BY USER','EXPIRED'));

		});



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
		Schema::drop('cancels');
	}

}