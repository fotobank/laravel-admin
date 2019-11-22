<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.

      Этот параметр контролирует проверку подлинности по умолчанию «охранник» и пароль
    | Сброс параметров для вашего приложения. Вы можете изменить эти значения по умолчанию
    | по мере необходимости, но они отличный старт для большинства приложений.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
       Далее, вы можете определить каждый охранник аутентификации для вашего приложения.
    | Конечно, большая конфигурация по умолчанию было определено для вас
    | здесь, который использует для хранения сеанса и провайдер пользователя Красноречивого.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
       Все драйверы аутентификации у провайдера пользователя. Это определяет, как
    | пользователи фактически извлекается из базы данных или другого хранилища
    | механизмы, используемые это приложение для сохранения данных вашего пользователя.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.

      Все драйверы аутентификации у провайдера пользователя. Это определяет, как
    | пользователи фактически извлекается из базы данных или другого хранилища
    | механизмы, используемые это приложение для сохранения данных вашего пользователя.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.

      Если у вас есть несколько пользовательских таблиц или моделей вы можете настроить несколько
    | Источники, которые представляют собой каждую модель / таблицу. Эти источники могут затем
    | быть назначено на любые дополнительные охранник аутентификации, которые вы определили.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.

      Вы можете указать несколько конфигураций сброса пароля, если у вас есть больше
    | чем одной таблицы пользователя или модель в приложении, и вы хотите иметь
    | Настройки отдельного сброса пароля на основе конкретных типов пользователей.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.

      Истекает время число минут, что маркер должен быть сброшен
    | считается действительным. Эта функция защиты хранит лексемы недолговечны так
    | они имеют меньше времени, чтобы догадаться. Вы можете изменить это по мере необходимости.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
