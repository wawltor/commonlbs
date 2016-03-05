<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComeventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comevent', function(Blueprint $table)
		{
			$table->increments('Id');
			$table->string('name',30);
			$table->string('address',30);
			$table->string('telephone',20);
			$table->string('content',20);
			$table->string('locaton',50);
			$table->integer('source');
			$table->string('photo_addr',50);
			$table->string('cate',255);
			$table->string('sub_cate',255);
			$table->integer('boolean_cate');
			$table->integer('state');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comevent');
	}

}
