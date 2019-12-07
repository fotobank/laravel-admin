<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLtmTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ltm_translations', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('status')->default(0);
			$table->string('locale');
			$table->string('group');
			$table->text('key', 65535);
			$table->text('value', 65535)->nullable();
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
		Schema::drop('ltm_translations');
	}

}
