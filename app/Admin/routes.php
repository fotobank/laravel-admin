<?php


use App\Admin\Controllers\AuthController;
use App\Admin\Controllers\UserController;
use App\Http\Controllers\EnvController;
use Illuminate\Routing\Router;
use Jxlwqq\EnvManager\Http\Controllers\EnvManagerController;
use KevinSoft\MultiLanguage\Http\Controllers\MultiLanguageController;
use Manzhouya\AuthAttempts\Http\Controllers\AuthAttemptsController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

	$router->post('/locale', 'AuthController@locale');
	$router->get('auth/login', 'AuthController@getLogin')->name('login.show');
	$router->post('auth/login', ['as' => 'auth.login.show', 'uses' => 'AuthController@postLogin']);

});

Route::resource('users', UserController::class);
Route::resource('env/manager', EnvController::class);
