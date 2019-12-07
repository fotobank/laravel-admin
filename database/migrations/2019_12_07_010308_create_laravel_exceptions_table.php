<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaravelExceptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravel_exceptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->string('code');
			$table->string('message');
			$table->string('file');
			$table->integer('line');
			$table->text('trace', 65535);
			$table->string('method');
			$table->string('path');
			$table->text('query', 65535);
			$table->text('body', 65535);
			$table->text('cookies', 65535);
			$table->text('headers', 65535);
			$table->string('ip');
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
		Schema::drop('laravel_exceptions');
	}

}
