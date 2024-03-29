<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 190)->unique();
			$table->string('password', 60);
			$table->string('name');
			$table->string('last_name', 190)->nullable();
			$table->string('email', 190)->nullable()->unique();
			$table->string('phone', 190)->nullable()->unique();
			$table->string('avatar')->nullable();
			$table->string('is_activated', 5)->nullable();
			$table->string('reset_password_code', 100)->nullable();
			$table->dateTime('last_login_at')->nullable();
			$table->string('last_login_ip', 190)->nullable();
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('admin_users');
	}

}
