<?php
/**
 *  @category   Laravel
 *  @package    laravel-admin
 *  @author     Alekseev Jury  <jurii@mail.ru>
 *  @copyright  2016-2019 The PHP Group
 *  @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 *  of the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 *  INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 *  PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
 *  BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 *  TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE
 *  OR OTHER DEALINGS IN THE SOFTWARE.
 */

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