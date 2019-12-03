<?php


namespace App\Admin\Translations;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;


class Manager extends \Barryvdh\TranslationManager\Manager
{
	public function __construct(Application $app, Filesystem $files, Dispatcher $events)
	{
		parent::__construct($app, $files, $events);
	}


	public function findTranslations($path = null)
	{
		$path = $path ?: base_path();
		$groupKeys = [];
		$stringKeys = [];
		$functions = $this->config['trans_functions'];

		$groupPattern =                          // See https://regex101.com/r/WEJqdL/6
			"[^\w|>]".                          // Must not have an alphanum or _ or > before real method
			'('.implode('|', $functions).')'.  // Must start with one of the functions
			"\(".                               // Match opening parenthesis
			"[\'\"]".                           // Match " or '
			'('.                                // Start a new group to match:
			'[a-zA-Z0-9_-]+'.                   // Must start with group
			"([.][^\{\$](?! )[^\1)]+)+".        // Be followed by one or more items/keys + add [^\{$]
			')'.                                // Close group
			"[\'\"]".                           // Closing quote
			"[\),]";                            // Close parentheses or new parameter

		$stringPattern =
			"[^\w]".                                     // Must not have an alphanum before real method
			'('.implode('|', $functions).')'.         // Must start with one of the functions
			"\(\s*".                                       // Match opening parenthesis
			"(?P<quote>['\"])".                            // Match " or ' and store in {quote}
			"(?P<string>(?:\\\k{quote}|(?!\k{quote}).)*)". // Match any string that can be {quote} escaped
			"\k{quote}".                                   // Match " or ' previously matched
			"\s*[\),]";                                    // Close parentheses or new parameter

		// Find all PHP + Twig files in the app folder, except for storage
		$finder = new Finder();
		$finder->in($path)->exclude('storage')->exclude('vendor')->name('*.php')->name('*.twig')->name('*.vue')->files();

		/** @var \Symfony\Component\Finder\SplFileInfo $file */
		foreach ($finder as $file) {
			// Search the current file for the pattern
			if (preg_match_all("/$groupPattern/siU", $file->getContents(), $matches)) {
				// Get all matches
				foreach ($matches[2] as $key) {
					if($key == 'admin.submit') {
						$t='';
					}
					$groupKeys[] = $key;
				}
			}

			if (preg_match_all("/$stringPattern/siU", $file->getContents(), $matches)) {
				foreach ($matches['string'] as $key) {
					if (preg_match("/(^[a-zA-Z0-9_-]+([.][^\1)\ ]+)+$)/siU", $key, $groupMatches)) {
						// group{.group}.key format, already in $groupKeys but also matched here
						// do nothing, it has to be treated as a group
						continue;
					}

					//TODO: This can probably be done in the regex, but I couldn't do it.
					//skip keys which contain namespacing characters, unless they also contain a
					//space, which makes it JSON.
					if (! (Str::contains($key, '::') && Str::contains($key, '.'))
						|| Str::contains($key, ' ')) {
						$stringKeys[] = $key;
					}
				}
			}
		}
		// Remove duplicates
		$groupKeys = array_unique($groupKeys);
		$stringKeys = array_unique($stringKeys);

		// Add the translations to the database, if not existing.
		foreach ($groupKeys as $key) {
			// Split the group and item
			list($group, $item) = explode('.', $key, 2);
			$this->missingKey('', $group, $item);
		}

		foreach ($stringKeys as $key) {
			$group = self::JSON_GROUP;
			$item = $key;
			$this->missingKey('', $group, $item);
		}

		// Return the number of found translations
		return count($groupKeys + $stringKeys);
	}




}
