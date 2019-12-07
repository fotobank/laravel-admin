<?php

return [

    'backup' => [

        /*
         * Название этого приложения. Вы можете использовать это имя для мониторинга
         * Резервное копирование.
         */
        'name' => config('app.name'),

        'source' => [

            'files' => [

                /*
                 * Список каталогов и файлов, которые будут включены в резервной копии.
                 */
                'include' => [
                    base_path(),
                ],

                /*
                 * Эти каталоги и файлы будут исключены из резервной копии.
                 *
                 * Каталоги, используемые процессом резервного копирования будут
                 *  автоматически исключены.
                 */
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],

                /*
                 * Определяет, будет ли символьные ссылки должны быть соблюдены.
                 */
                'followLinks' => false,
            ],

            /*
             * Названия соединений с базами данных, которые должны быть подкреплены
             * Базы данных MySQL, PostgreSQL, SQLite и Mongo поддерживаются.
             *
             * Содержание дампа базы данных могут быть настроены для каждого соединения
             * Путем добавления ключа сбрасывающий в настройках подключения
             *  в конфигурации / database.php.
             * Например
             * 'mysql' => [
             *       ...
             *      'dump' => [
             *           'excludeTables' => [
             *                'table_to_exclude_from_backup',
             *                'another_table_to_exclude'
             *            ]
             *       ]
             * ],
             *
             * Полный список доступных параметров настройки, смотреть https://github.com/spatie/db-dumper
             */
            'databases' => [
                'mysql',
            ],
        ],

        /*
         * Дамп базы данных может быть сжат, чтобы уменьшить использование
         *  дискового пространства.
         *
         * Из коробки Laravel-резервные источники
         * Spatie\DbDumper\Compressors\GzipCompressor::class.
         *
         * Кроме того, можно создать собственный компрессор.
         * Более подробная информация о том здесь:
         * https://github.com/spatie/db-dumper#using-compression
         *
         * Если вы не хотите какой-либо компрессор вообще, установите его в нуль.
         */
        'database_dump_compressor' => null,

        'destination' => [

            /*
             * Имя файла префикс, используемый для резервного копирования архива.
             */
            'filename_prefix' => '',

            /*
             * Названия дисков, на которых будут храниться резервные копии.
             */
            'disks' => [
                'local',
            ],
        ],

        /*
         * Каталог, в котором будут храниться временные файлы.
         */
        'temporary_directory' => storage_path('app/backup-temp'),
    ],

    /*
     * Вы можете получить уведомление, когда происходят определенные события. Из коробки можно использовать 'mail' а также 'slack'.
     * Для Slack вам необходимо установить guzzlehttp/guzzle.
     *
     * Вы также можете использовать свои собственные классы уведомлений, просто убедитесь,
     *  что класс назван в честь одного из `Spatie\Backup\Events` классов.
     */
    'notifications' => [

        'notifications' => [
            \Spatie\Backup\Notifications\Notifications\BackupHasFailed::class         => ['mail'],
            \Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFound::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\CleanupHasFailed::class        => ['mail'],
            \Spatie\Backup\Notifications\Notifications\BackupWasSuccessful::class     => ['mail'],
            \Spatie\Backup\Notifications\Notifications\HealthyBackupWasFound::class   => ['mail'],
            \Spatie\Backup\Notifications\Notifications\CleanupWasSuccessful::class    => ['mail'],
        ],

        /*
         * Здесь вы можете указать уведомляемый, к которому должны отсылаться уведомления.
         *  По умолчанию уведомлению будет использовать переменные,
         *  указанные в этом файле конфигурации.
         */
        'notifiable' => \Spatie\Backup\Notifications\Notifiable::class,

        'mail' => [
            'to' => 'your@example.com',
        ],

        'slack' => [
            'webhook_url' => '',

            /*
             * Если этот параметр установлен на нуль
             *  канал по умолчанию webhook будет использоваться.
             */
            'channel' => null,

            'username' => null,

            'icon' => null,

        ],
    ],

    /*
     * Здесь вы можете указать, какие резервные копии должны быть проверены.
     * Если резервная копия не соответствует установленным требованиям
     * UnHealthyBackupWasFound событие будет уволен.
     */
    'monitorBackups' => [
        [
            'name' => config('app.name'),
            'disks' => ['local'],
            'newestBackupsShouldNotBeOlderThanDays' => 1,
            'storageUsedMayNotBeHigherThanMegabytes' => 5000,
        ],

        /*
        [
            'name' => 'имя второго приложения',
            'disks' => ['local', 's3'],
            'newestBackupsShouldNotBeOlderThanDays' => 1,
            'storageUsedMayNotBeHigherThanMegabytes' => 5000,
        ],
        */
    ],

    'cleanup' => [
        /*
         *  Стратегия, которая будет использоваться для очистки старых резервных копий.
         *
         *  Стратегия по умолчанию будет хранить все резервные копии в течение
         *  определенного количества дней. Только после этого периода ежедневное резервное
         *  копирование будет сохранено. После этого периода только еженедельные резервные
         *  копии будут быть и так далее.
         *
         * Независимо от того, как настроить его стратегия по умолчанию никогда не будет
         * удалена новейшая копия.
         */
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,

        'defaultStrategy' => [

            /*
             * Количество дней, в течение которых должны храниться резервные копии.
             */
            'keepAllBackupsForDays' => 7,

            /*
             * Количество дней, в течение которых необходимо хранить ежедневные резервные копии.
             */
            'keepDailyBackupsForDays' => 16,

            /*
             * Количество недель, через которые должны быть сохранена копия.
             */
            'keepWeeklyBackupsForWeeks' => 8,

            /*
             * Месячные копии
             * Количество месяцев в течении которых хранятся ежемесячные копии
             */
            'keepMonthlyBackupsForMonths' => 4,

            /*
             * Годовые копии
             * Количество лет в течении которых хранятся годовые копии
             */
            'keepYearlyBackupsForYears' => 2,

            /*
             * Количество места на  диске, после достижения которого старые копии
             *  будут удаляться.
             */
            'deleteOldestBackupsWhenUsingMoreMegabytesThan' => 5000,
        ],
    ],


    /*
   |--------------------------------------------------------------------------
    бэкап из командной строки
    https://github.com/paulvl/backup
    Команды:

    Бэкап:
    php artisan backup:mysql-dump
    php artisan backup:mysql-dump custom_name
    php artisan backup:mysql-dump --compress
    php artisan backup:mysql-dump --no-compress

    Восстановление:
    php artisan backup:mysql-restore --filename=backup_filename

    Вывод списка и восстановление базы данных без запроса:
    php artisan backup:mysql-restore --all-backup-files --yes

    Из облака:
    php artisan backup:mysql-restore --from-cloud

    Восстановление последнего файла базы данных без запроса:
	php artisan backup:mysql-restore --restore-latest-backup --yes

   | MYSQL
   |--------------------------------------------------------------------------
   */

    'mysql' => [

	    /*
		|--------------------------------------------------------------------------
		| mysql Path
		|--------------------------------------------------------------------------
		|
		| Path to mysql, must be absolute on windows.
		|
		*/

	    'mysql_path' => 'mysql',

	    /*
		|--------------------------------------------------------------------------
		| mysqldump Path
		|--------------------------------------------------------------------------
		|
		| Path to mysqldump, must be absolute on windows.
		|
		*/

	    'mysqldump_path' => 'mysqldump',

	    /*
		|--------------------------------------------------------------------------
		| File compression
		|--------------------------------------------------------------------------
		|
		| Enable or disable file compression.
		|
		*/

	    'compress' => false,

	    /*
		|--------------------------------------------------------------------------
		| Local Storage
		|--------------------------------------------------------------------------
		*/

	    'local-storage' => [

		    /*
			|--------------------------------------------------------------------------
			| Local Storage Disk Name
			|--------------------------------------------------------------------------
			*/

		    'disk' => 'backup',

		    /*
			|--------------------------------------------------------------------------
			| Local Storage Path
			|--------------------------------------------------------------------------
			*/

		    'path' => DIRECTORY_SEPARATOR,

	    ],

	    /*
		|--------------------------------------------------------------------------
		| Cloud Storage
		|--------------------------------------------------------------------------
		*/

	    'cloud-storage' => [

		    /*
			|--------------------------------------------------------------------------
			| Enabled Cloud Storage?
			|--------------------------------------------------------------------------
			*/

		    'enabled' => false,

		    /*
			|--------------------------------------------------------------------------
			| Cloud Storage Disk Name
			|--------------------------------------------------------------------------
			*/

		    'disk' => 's3',

		    /*
			|--------------------------------------------------------------------------
			| Cloud Storage Path
			|--------------------------------------------------------------------------
			*/

		    'path' => 'path/to/your/backup-folder/',

		    /*
			|--------------------------------------------------------------------------
			| Keep Local Files After Cloud Storage?
			|--------------------------------------------------------------------------
			*/

		    'keep-local' => true,

	    ],

    ],

];
