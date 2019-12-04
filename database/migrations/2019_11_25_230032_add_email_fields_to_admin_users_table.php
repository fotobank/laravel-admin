<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailFieldsToAdminUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table(config('admin.database.users_table'), function (Blueprint $table) {

			$table->string('last_name', 190)->after('name')->nullable()->default(null);
			$table->string('email', 190)->unique()->nullable()->default(null)->after('last_name');
			$table->string('phone', 190)->unique()->nullable()->default(null)->after('email');
			$table->string('is_activated', 5)->nullable()->default(null)->after('avatar');
			$table->string('reset_password_code', 100)->nullable()->after('is_activated');
			$table->datetime('last_login_at')->nullable()->after('reset_password_code');
			$table->string('last_login_ip', 190)->nullable()->after('last_login_at');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

	    Schema::table(config('admin.database.users_table'), function (Blueprint $table) {
		    $table->dropColumn([
		    	'last_name',
			    'email',
			    'phone',
			    'is_activated',
			    'reset_password_code',
			    'last_login_at',
			    'last_login_ip'
		    ]);
	    });
    }
}
