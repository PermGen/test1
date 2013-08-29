<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table)
		{

			$table->increments('user_id');	
			$table->string('Email');
			$table->string('First_Name');
			$table->string('Last_Name');
			$table->string('Phone_Number');
			$table->string('Password',64);
			$table->string('Mailing_Address');
			$table->string('Street_Address');
			$table->enum('Account_type',array('A','B','C'));
			$table->enum('isFB',array('0','1'))->default(0);
			$table->enum('Regconfirm',array('0','1'))->default(0);
			$table->timestamps();
		}
		);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}