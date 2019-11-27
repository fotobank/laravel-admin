<?php

namespace App\Providers;

use Encore\Admin\Extension;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Регистрация любых услуг аутентификации / авторизации.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

	    $this->app->booted(function () {
		    Extension::routes(__DIR__.'/../Admin/routes.php');
	    });
    }
}
