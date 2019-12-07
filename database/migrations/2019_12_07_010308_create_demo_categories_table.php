<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemoCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demo_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')->default(0);
			$table->integer('order')->default(0);
			$table->string('title', 50);
			$table->string('desc');
			$table->timestamps();
			$table->string('logo', 50)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('demo_categories');
	}

}
