<?php

namespace App\Http\Controllers;

use Barryvdh\TranslationManager\Manager;
use DB;
use Barryvdh\TranslationManager\Controller as BarryvdhController;

class TranslationManagerController extends BarryvdhController
{
	/**
	 * TranslatiomManagerController constructor.
	 * @param Manager $manager
	 */
	public function __construct(Manager $manager)
	{
		parent::__construct($manager);
	}

	public function clearTable() {
	//	DB::statement('truncate table ltm_translations');
		DB::table('ltm_translations')->truncate();
	}

}
