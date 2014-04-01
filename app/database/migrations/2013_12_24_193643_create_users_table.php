<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('first_name', 32);
			$table->string('last_name', 32);
			$table->string('email', 128);
			$table->string('password', 128);
			$table->string('student_number', 15)->nullable();
			$table->string('phone_number', 15)->nullable();
			$table->date('birthday')->nullable();
			$table->string('gender')->nullable();
			$table->integer('status')->default(2);
			$table->string('faculty_name', 72)->nullable();
			$table->string('department_name', 72)->nullable();	

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
		Schema::drop('users');
	}

}
