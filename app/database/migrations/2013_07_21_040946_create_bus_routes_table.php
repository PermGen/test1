<?php

use Illuminate\Database\Migrations\Migration;

class CreateBusRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('bus_routes',function($table){

			$table->increments('route_id');
			$table->integer('busid');			
			$table->date('departure_date');
			$table->time('departure_time');
			$table->float('amount');
			$table->string('leaving_from');
			$table->string('going_to');
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
		Schema::drop('bus_routes');
	}

}