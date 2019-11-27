<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin name
    |--------------------------------------------------------------------------
    |
    | This value is the name of laravel-admin, This setting is displayed on the
    | login page.
    |
    */
    'name' => 'Админка',

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages. You can also set it as an image by using a
    | `img` tag, eg '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo' => '<b>Laravel</b> admin',

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin mini logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages when the sidebar menu is collapsed. You can
    | also set it as an image by using a `img` tag, eg
    | '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo-mini' => '<b>La</b>',

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin bootstrap setting
    |--------------------------------------------------------------------------
    |
    | This value is the path of laravel-admin bootstrap file.
    |
    */
    'bootstrap' => app_path('Admin/bootstrap.php'),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin route settings
    |--------------------------------------------------------------------------
    |
    | The routing configuration of the admin page, including the path prefix,
    | the controller namespace, and the default middleware. If you want to
    | access through the root path, just set the prefix to empty string.
    |
    */
    'route' => [

        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

        'namespace' => 'App\\Admin\\Controllers',

        'middleware' => ['web', 'admin'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin install directory
    |--------------------------------------------------------------------------
    |
    | The installation directory of the controller and routing configuration
    | files of the administration page. The default is `app/Admin`, which must
    | be set before running `artisan admin::install` to take effect.
    |
    */
    'directory' => app_path('Admin'),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin html title
    |--------------------------------------------------------------------------
    |
    | Html title for all pages.
    |
    */
    'title' => 'Admin',

    /*
    |--------------------------------------------------------------------------
    | Access via `https`
    |--------------------------------------------------------------------------
    |
    | If your page is going to be accessed via https, set it to `true`.
    |
    */
    'https' => env('ADMIN_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin auth setting
    |--------------------------------------------------------------------------
    |
    | Authentication settings for all admin pages. Include an authentication
    | guard and a user provider setting of authentication driver.
    |
    | You can specify a controller for `login` `logout` and other auth routes.
    |
    */
    'auth' => [

        'controller' => App\Admin\Controllers\AuthController::class,
        'guard' => 'admin',
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Encore\Admin\Auth\Database\Administrator::class,
            ],
        ],

        // Добавить «запомнить меня» в форме авторизации
        'remember' => true,

        // включить капчу при входе в админку
        'captcha' =>  env('AUTH_CAPTCHA', false),

        // Перенаправление на указанный URI, когда пользователь не авторизован.
        'redirect_to' => 'auth/login',

        // URI, которые должны быть исключены из разрешения.
        'excepts' => [
            'auth/login',
            'auth/logout',
	        'locale',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Настройка загрузки Laravel-администратора
    |--------------------------------------------------------------------------
    |
    | Конфигурация файловой системы для формы загрузки файлов и изображений, в том числе
    | диск и путь загрузки.
    |
    */
    'upload' => [

        // выбор диска в`config/filesystem.php`
        // варианты:  local/public/s3/admin/ftp/Rackspace
		// после выбора удалить линк storage в папке public
        // и сделать его заново: php artisan storage:link
        'disk' => 'public',
        // Изображение и загрузка файла путь под диском выше.
        'directory' => [
            'image' => 'images',
            'file'  => 'files',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin database settings
    |--------------------------------------------------------------------------
    |
    | Here are database settings for laravel-admin builtin model & tables.
    |
    */
    'database' => [

        // Подключение к базе данных для следующих таблиц.
        'connection' => '',

        // таблицы пользователей и модель.
        'users_table' => 'admin_users',
        'users_model' => Encore\Admin\Auth\Database\Administrator::class,

        // Таблица Роль и модель.
        'roles_table' => 'admin_roles',
        'roles_model' => Encore\Admin\Auth\Database\Role::class,

        // Разрешение стол и модель.
        'permissions_table' => 'admin_permissions',
        'permissions_model' => Encore\Admin\Auth\Database\Permission::class,

        // Таблица меню и модель.
        'menu_table' => 'admin_menu',
        'menu_model' => Encore\Admin\Auth\Database\Menu::class,

        // Pivot table for table above.
        'operation_log_table'    => 'admin_operation_log',
        'user_permissions_table' => 'admin_user_permissions',
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
    ],

    /*
    |--------------------------------------------------------------------------
    | User operation log setting
    |--------------------------------------------------------------------------
    |
    | By setting this option to open or close operation log in laravel-admin.
    |
    */
    'operation_log' => [

        'enable' => true,

        /*
         * Only logging allowed methods in the list
         */
        'allowed_methods' => ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],

        /*
         * Маршруты, которые не будут входить в базу данных.
         *
         * Весь метод путь, как: admin/auth/logs
         * или конкретный метод пути, как: get:admin/auth/logs.
         */
        'except' => [
            'admin/auth/logs*',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Указывает, следует ли проверять разрешение маршрута.
    |--------------------------------------------------------------------------
    */
    'check_route_permission' => true,

    /*
    |--------------------------------------------------------------------------
    | Указывает, следует ли проверять роли меню.
    |--------------------------------------------------------------------------
    */
    'check_menu_roles'       => true,

    /*
    |--------------------------------------------------------------------------
    | User default avatar
    |--------------------------------------------------------------------------
    |
    | Установить аватар по умолчанию для вновь создаваемых пользователей.
    |
    */
    'default_avatar' => '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg',

    /*
    |--------------------------------------------------------------------------
    | Admin map field provider
    |--------------------------------------------------------------------------
    |
    | Supported: "tencent", "google", "yandex".
    |
    */
    'map_provider' => 'google',

    /*
    |--------------------------------------------------------------------------
    | Application Skin
    |--------------------------------------------------------------------------
    |
    | This value is the skin of admin pages.
    | @see https://adminlte.io/docs/2.4/layout
    |
    | Supported:
    |    "skin-blue", "skin-blue-light", "skin-yellow", "skin-yellow-light",
    |    "skin-green", "skin-green-light", "skin-purple", "skin-purple-light",
    |    "skin-red", "skin-red-light", "skin-black", "skin-black-light".
    |
    */
    'skin' => 'skin-green',

    /*
    |--------------------------------------------------------------------------
    | Application layout
    |--------------------------------------------------------------------------
    |
    | Это значение является расположение администратора страниц.
    | @see https://adminlte.io/docs/2.4/layout
    |
    | Supported: "fixed", "layout-boxed", "layout-top-nav", "sidebar-collapse",
    | "sidebar-mini".
    |
    */
    'layout' => ['sidebar-mini', 'fixed'],

    /*
    |--------------------------------------------------------------------------
    | Login page background image
    |--------------------------------------------------------------------------
    |
    | This value is used to set the background image of login page.
    |
    */
    'login_background_image' => '',

    /*
    |--------------------------------------------------------------------------
    | Show version at footer
    |--------------------------------------------------------------------------
    |
    | Whether to display the version number of laravel-admin at the footer of
    | each page
    |
    */
    'show_version' => true,

    /*
    |--------------------------------------------------------------------------
    | Show environment at footer
    |--------------------------------------------------------------------------
    |
    | Whether to display the environment at the footer of each page
    |
    */
    'show_environment' => true,

    /*
    |--------------------------------------------------------------------------
    | Menu bind to permission
    |--------------------------------------------------------------------------
    |
    | whether enable menu bind to a permission
    */
    'menu_bind_permission' => true,

    /*
    |--------------------------------------------------------------------------
    | Enable default breadcrumb
    |--------------------------------------------------------------------------
    |
    | Whether enable default breadcrumb for every page content.
    */
    'enable_default_breadcrumb' => true,

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable assets minify
    |--------------------------------------------------------------------------
    */
    'minify_assets' => [

        // Assets will not be minified.
        'excepts' => [

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable sidebar menu search
    |--------------------------------------------------------------------------
    */
    'enable_menu_search' => true,

    /*
    |--------------------------------------------------------------------------
    |Предупреждение, которое отображается в верхней части страницы.
    |--------------------------------------------------------------------------
    */
    'top_alert' => '',

    /*
    |--------------------------------------------------------------------------
    | The global Grid action display class.
    |--------------------------------------------------------------------------
    */
    'grid_action_class' => \Encore\Admin\Grid\Displayers\DropdownActions::class,

    /*
    |--------------------------------------------------------------------------
    | Extension Directory
    |--------------------------------------------------------------------------
    |
    | When you use command `php artisan admin:extend` to generate extensions,
    | the extension files will be generated in this directory.
    */
    'extension_dir' => app_path('Admin/Extensions'),

    /*
    |--------------------------------------------------------------------------
    | Settings for extensions.
    |--------------------------------------------------------------------------
    |
    | You can find all available extensions here
    | https://github.com/laravel-admin-extensions.
    |
    */
	'extensions' => [

		'api-tester' => [
			// route prefix for APIs
			'prefix' => 'api',
			// auth guard for api
			'guard'  => 'api',
			//Если вы не используете модель пользователя по умолчанию
			// в качестве модели аутентификации, установите его
			'user_retriever' => function ($id) {
				return \App\User::find($id);
			},
		],
		'media-manager' => [
			// Select a local disk that you configured in `config/filesystem.php`
			'disk' => 'public'
		],
		'grid-lightbox' => [

			// Set to `false` if you want to disable this extension
			'enable' => true,
		],
		'admin-config' => [
			'title'=>'AdminConfig',
			'description'=>'Manage your profiles as profiles',
			'action'=>' ',
		],
		'ueditor' => [

			'enable' => true,
			// Передний конец редактора эталонной конфигурации：http://fex.baidu.com/ueditor/#start-config
			'config' => [
				'initialFrameHeight' => 400, // Например, начальная высота
			],
			// 'field_type' => 'имя пользовательского'
		],
		'wang-editor' => [

			// Если вы хотите, чтобы отключить это расширение устанавливается в ложь
			'enable' => true,

			// Редактор конфигурации
			'config' => [
				// `/upload` Интерфейс используется для загрузки файлов для загрузки их собственной логики, чтобы достичь, вы можете обратиться к следующим `` загружать фотографии
				'uploadImgServer' => '/upload'
			]
		],
		'json-editor' => [
			// set to false if you want to disable this extension
			'enable' => true,
			'config' =>
				[
					'mode' => 'tree',
					'modes' => ['code', 'form', 'text', 'tree', 'view'], // allowed modes
				],
		],
		'simditor' => [
			// Set to false if you want to disable this extension
			'enable' => true,
			// Editor configuration
			'config' => [
				'upload' => [
					'url' => '/admin/api/upload', # example api route: admin/api/upload
					'fileKey' => 'upload_file',
					'connectionCount' => 3,
					'leaveConfirm' => 'Uploading is in progress, are you sure to leave this page?'
				],
				'tabIndent' => true,
				'toolbar' => ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'],
				'toolbarFloat' => true,
				'toolbarFloatOffset' => 0,
				'toolbarHidden' => false,
				'pasteImage' => true,
				'cleanPaste' => false,
			]
		],
		'tencent-map' => [
			'enable' => true,
			'api_key' => env('TENCENT_MAP_API_KEY')
		],
		// защита от подбора пароля
		'auth-attempts' => [
			'enable' => true,
			// количество попыток
			'maxAttempts'  => 5,
			// кол-во минут блокировки
			'decayMinutes' => 1,
		],
		'multi-language' => [
			'enable' => true,
			// the key should be same as var locale in config/app.php
			// the value is used to show
			'languages' => [
				'en' => 'English',
				'ru' => 'Русский',
			],
			// default locale
			'default' => 'ru',
		],
		'echarts' => [
			// Set to `false` if you want to disable this extension
			'enable' => true,
		],
		'material-ui' => [
			'enable' => true,
		],
		'data-table' => [

			'enable' => true,
			// global options
			'options' => [
				'paging' => false,
				'lengthChange' => false,
				'searching' => false,
				'ordering' => false,
				'info' => false,
				'language' => 'Русский', // or English
			]
		],
		'star-rating' => [

			// set to false if you want to disable this extension
			'enable' => true,
			// configuration
			'config' => [
				'min' => 1, 'max' => 5, 'step' => 1, 'size' => 'xs', 'language' => 'ru',
			]
		],
		// обрезка изображений
		'cropper' => [
			'enable' => true,
		],
		'file-manager' => [
			// Select a local disk that you configured in `config/filesystem.php`
			'disk' => 'public'
		],
		'composer-viewer' => [
			'enable' => true,
		],
		'env-manager' => [
			'enable' => true
		],
		'js-editor' => [
			// Set to false if you want to disable this extension
			'enable' => true,
			// Editor configuration
			'config' => []
		],
		'php-editor' => [
			//Set to false if you want to disable this extension
			'enable' => true,
			// Editor configuration
			'config' => []
		],
		'css-editor' => [

			'enable' => true,
			// editor configuration
			'config' => [
			]
		],
		'daterangepicker' => [

			'enable' => true,
			// Find more configurations http://www.daterangepicker.com/
			'config' => [
			]
		],
		// Config extension
		'config' => [
			// имя таблицы в базе данных для Config extension
			'table' => 'admin_config',
			// откуда брать конфиг
			'name' => 'config',
			// контролер конфигурации
			'controller' => 'App\Http\Controllers\AdminConfigController',

		],
		'phpinfo' => [

			// Set this to false if you want to disable this extension
			'enable' => true,

			// What information to show，see http://php.net/manual/en/function.phpinfo.php#refsect1-function.phpinfo-parameters
			'what' => INFO_ALL,

			// Set access path，defaults to `phpinfo`
			//'path' => '~phpinfo',
		],
		'simplemde' => [

			// Set to false if you want to disable this extension
			'enable' => true,

			// If you want to set an alias for the calling method
			//'alias' => 'markdown',

			// Editor configuration
			// https://github.com/sparksuite/simplemde-markdown-editor#configuration
			'config' => [
					'autofocus'   => true,
					'placeholder' => 'xxxx',
                 ]
		],

	],
];
