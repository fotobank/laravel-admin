<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | Настройки группы по умолчанию для маршрутов elFinder.
    |
    */
    'route'          => [
        'prefix'     => config('admin.route.prefix') . '/translations',
        'namespace' => 'Barryvdh\\TranslationManager',
        'middleware' => ['web', 'admin'],
                ],

    /**
     * Разрешить удаление переводов
     *
     * @type boolean
     */
    'delete_enabled' => true,

    /**
     * Исключение определенных групп из Laravel Translation Manager.
     * Это полезно, если, например, вы хотите, чтобы избежать редактирования официальных файлов Laravel языка.
     *
     * @type array
     *
     *    array(
     *        'pagination',
     *        'reminders',
     *        'validation',
     *    )
     */
    'exclude_groups' => [],

    /**
     * Исключите определенные языки из Laravel Translation Manager.
     *
     * @type array
     *
     *    array(
     *        'fr',
     *        'de',
     *    )
     */
    'exclude_langs'  => [
    	'ar','az','es','fa','fr','he','id','ja','ko','ms','nl','pl','pt','pt-BR',
	    'tr','zh-CN','zh-TW'
    ],

    /**
     * Экспорт переводов в алфавитном порядке.
     */
    'sort_keys '     => false,

    'trans_functions' => [
        'trans',
        'trans_choice',
        'Lang::get',
        'Lang::choice',
        'Lang::trans',
        'Lang::transChoice',
        '@lang',
        '@choice',
        '__',
        '$trans.get',
    ],

];
