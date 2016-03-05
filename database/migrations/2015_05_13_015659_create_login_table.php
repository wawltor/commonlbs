<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login', function(Blueprint $table)
		{
			$table->increments('Id')->unique();
			$table->string('username',20);
			$table->string('password',20);
			$table->string('name',20);
			$table->string('community',50);
			$table->string('meno',50);

		});
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login');
	}

}
