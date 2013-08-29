<?php

use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		   Schema::create('buses',function($table){
			$table->increments('busid');		
			$table->string('bustype');
			$table->integer('capacity');
			$table->integer('availableseats');		
			$table->enum('status',array('CLOSED','ONROAD','WAITING','ONBOARD'));//onroad or waiting
			$table->string('busplate_no');
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
		Schema::drop('buses');
	}

}