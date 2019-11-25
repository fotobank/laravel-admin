<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете настроить так много файловых систем «дисков», как вы хотите, и вы
    | может даже настроить несколько дисков одного и того же водителя. Значения по умолчанию имеют
    | был настроен для каждого драйвера в качестве примера необходимых опций.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
	|
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),

        ],
        'admin' => [
	        'driver'     => 'local',
	        'root'       => public_path('upload'),
	        'visibility' => 'public',
	        'url' => env('APP_URL').'/public/upload/',
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
        'ftp' => [
	        'driver'   => 'ftp',
	        'host'     => 'ftp.example.com',
	        'username' => 'your-username',
	        'password' => 'your-password',

	        // Optional FTP Settings...
	        // 'port'     => 21,
	        // 'root'     => '',
	        // 'passive'  => true,
	        // 'ssl'      => true,
	        // 'timeout'  => 30,
        ],
        'rackspace' => [
	        'driver'    => 'rackspace',
	        'username'  => 'your-username',
	        'key'       => 'your-key',
	        'container' => 'your-container',
	        'endpoint'  => 'https://identity.api.rackspacecloud.com/v2.0/',
	        'region'    => 'IAD',
	        'url_type'  => 'publicURL',
        ],

    ],

];
