<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemoTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demo_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('hot')->default(0);
			$table->boolean('new')->default(0);
			$table->boolean('recommend')->default(0);
			$table->string('options')->default('');
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
		Schema::drop('demo_tags');
	}

}
