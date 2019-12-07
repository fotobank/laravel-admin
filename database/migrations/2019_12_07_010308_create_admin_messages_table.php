<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from');
			$table->integer('to');
			$table->string('title');
			$table->text('message', 65535);
			$table->dateTime('read_at');
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
		Schema::drop('admin_messages');
	}

}
