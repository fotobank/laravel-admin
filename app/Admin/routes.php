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

//------------------------------------------------------------------------------------------
	$router->get('/', 'HomeController@index');
	$router->resources([

		'tags'                  => TagController::class,
		'users'                 => UserController::class,
		'images'                => ImageController::class,
		'posts'                 => PostController::class,
		'post-comments'         => PostCommentController::class,
		'videos'                => VideoController::class,
		'articles'              => ArticleController::class,
		'painters'              => PainterController::class,
		'categories'            => CategoryController::class,
		'messages'              => MessageController::class,
		'multiple-images'       => MultipleImageController::class,

		'movies/in-theaters'    => Movies\InTheaterController::class,
		'movies/coming-soon'    => Movies\ComingSoonController::class,
		'movies/top250'         => Movies\Top250Controller::class,

		'documents'             => DocumentController::class,
	]);

	$router->group(['prefix' => 'editors'], function ($router) {
		$router->get('markdown', EditorsController::class.'@markdown');
		$router->get('wang-editor', EditorsController::class.'@wangEditor');
		$router->get('summernote', EditorsController::class.'@summernote');
		$router->get('json', EditorsController::class.'@json');
	});

	$router->group(['prefix' => 'code-mirror'], function ($router) {
		$router->get('clike', CodemirrorController::class.'@clike');
		$router->get('php', CodemirrorController::class.'@php');
		$router->get('js', CodemirrorController::class.'@js');
		$router->get('python', CodemirrorController::class.'@python');
	});

	$router->group(['prefix' => 'lightbox'], function ($router) {
		$router->get('lightbox', LightboxController::class.'@lightbox');
		$router->get('gallery', LightboxController::class.'@gallery');
	});

	$router->post('posts/release', 'PostController@release');
	$router->post('posts/restore', 'PostController@restore');
	$router->get('api/users', 'PostController@users');

	$router->get('forms/form-1', 'FormController@form1');
	$router->get('forms/form-2', 'FormController@form2');
	$router->get('forms/form-3', 'FormController@form3');
	$router->get('forms/form-4', 'FormController@form4');
	$router->get('forms/settings', 'FormController@settings');
	$router->get('forms/register', 'FormController@register');

	$router->get('widgets/table', 'WidgetsController@table');
	$router->get('widgets/box', 'WidgetsController@box');
	$router->get('widgets/info-box', 'WidgetsController@infoBox');
	$router->get('widgets/tab', 'WidgetsController@tab');
	$router->get('widgets/notice', 'WidgetsController@notice');
	$router->get('widgets/editors', 'WidgetsController@editors');

	$router->get('chartjs', 'ChartjsController@index');
//---------------------------------------------------------------------------------


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


	// Clear Cache
	/*Route::get('/cache-clear', function () {

		Artisan::call('cache:clear');
	    Artisan::call('config:clear');
	    Artisan::call('view:clear');
	    Artisan::call('route:clear');


		return redirect()->route('adminHome')->with('doneMessage', trans('backLang.cashClearDone'));
	})->name('cacheClear');*/

	/*Route::get('/artisan/{cmd}', function($cmd) {
		$cmd = trim(str_replace("-",":", $cmd));
		$validCommands = ['cache:clear', 'optimize', 'route:cache', 'route:clear', 'view:clear', 'config:cache'];
		if (in_array($cmd, $validCommands)) {
			Artisan::call($cmd);
			return "<h1>Ran Artisan command: {$cmd}</h1>";
		} else {
			return "<h1>Not valid Artisan command</h1>";
		}
	});*/


});

$config = config('translation-manager.route', []);
$config['namespace'] = 'App\\Admin\\Translations';
Route::group($config, function(Router $router)
{
	$router->post('/reset', 'Controller@postReset')
		->name('translations:reset');
	$router->post('/find', 'Controller@postFind')->name('translations:find');
});


