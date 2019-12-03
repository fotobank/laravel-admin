<?php


namespace App\Admin\Translations;


use Barryvdh\TranslationManager\Models\Translation;
use Barryvdh\TranslationManager\Controller as BarryvdhController;

class Controller extends BarryvdhController
{
	/**
	 * TranslatiomManagerController constructor.
	 * @param Manager $manager
	 */
	public function __construct(Manager $manager)
	{
		parent::__construct($manager);
	}

	public function postReset() {

//		DB::table('ltm_translations')->truncate();

		Translation::truncate();

	}

	public function postFind()
	{
		$numFound = $this->manager->findTranslations();

		return ['status' => 'ok', 'counter' => (int) $numFound];
	}

}
