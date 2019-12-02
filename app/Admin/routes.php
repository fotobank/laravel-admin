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


// Compass Routes
	Route::group([
		'as'     => 'compass.',
		'prefix' => 'compass',
	], function () {
		Route::get('/', ['uses' => 'CompassController@index',  'as' => 'index']);
		Route::post('/', ['uses' => 'CompassController@index',  'as' => 'post']);
	});

});

Route::resource('users', UserController::class);
Route::resource('env/manager', EnvController::class);

// translation-manager routes
$config = config('translation-manager.route', []);
Route::group($config, function(Router $router)
{
	$router->get('view/{groupKey?}', 'Controller@getView')->where('groupKey', '.*');
	$router->get('/{groupKey?}', 'Controller@getIndex')->where('groupKey', '.*');
	$router->post('/add/{groupKey}', 'Controller@postAdd')->where('groupKey', '.*');
	$router->put('/edit/{groupKey}', 'Controller@postEdit')->where('groupKey', '.*');
	$router->post('/edit/{groupKey}', 'Controller@postEdit')->where('groupKey', '.*');
	$router->post('/groups/add', 'Controller@postAddGroup');
	$router->post('/delete/{groupKey}/{translationKey}', 'Controller@postDelete')->where('groupKey', '.*');
	$router->post('/import', 'Controller@postImport');
	$router->post('/find', 'Controller@postFind');
	$router->post('/locales/add', 'Controller@postAddLocale');
	$router->post('/locales/remove', 'Controller@postRemoveLocale');
	$router->post('/publish/{groupKey}', 'Controller@postPublish')->where('groupKey', '.*');
	$router->post('/translate-missing', 'Controller@postTranslateMissing');
});

$config = config('translation-manager.route', []);
$config['namespace'] = 'App\\Admin\\Translations';
Route::group($config, function(Router $router)
{
	$router->post('/reset', 'TranslationManagerController@postReset')
		->name('translations:reset');
});
