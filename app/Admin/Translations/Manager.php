<?php


namespace App\Admin\Translations;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;



class Manager extends \Barryvdh\TranslationManager\Manager
{
	public function __construct(Application $app, Filesystem $files, Dispatcher $events)
	{
		parent::__construct($app, $files, $events);
	}






}
