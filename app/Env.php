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

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jxlwqq\EnvManager\Env as EnvJxlwqq;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;


class Env extends Model
{

	protected $primaryKey = 'id';
	protected $keyType = 'int';
	private $envFilePath;


	public function __construct(array $attributes = [])
	{
		$this->envFilePath = config('admin.extensions.env-manager.env-file-path', base_path().'/.env');
		parent::__construct($attributes);
	}

	/**
	 * формирование данных для страницы
	 * @return LengthAwarePaginator
	 *
	 */
	public function paginate(): LengthAwarePaginator
	{
		$perPage = Request::get('per_page', 20);
		$page = Request::get('page', 1);
		$start = ($page - 1) * $perPage;
		$data = $this->getFullEnv();
		$list = array_slice($data, $start, $perPage);
		$list = static::hydrate($list);
		$paginator = new LengthAwarePaginator($list, count($data), $perPage);
		$paginator->setPath(url()->current());
		return $paginator;
	}

	// заглушка
	public static function with($relations)
	{
		return new static;
	}


	public function findOrFail($id)
	{
		$item = $this->getLineEnv($id);
		return $this->newFromBuilder($item);
	}

	/**
	 * пакетное удаление линий в файле
	 * @param $id
	 * @return string
	 */
	public function deleteLines($id)
	{
			$deleteArr = explode(',', $id);
			$file = file($this->envFilePath);

		    if($file) {
			    foreach ($deleteArr as $key) {
				    unset($file[($key - 1)]);
			    }
			     file_put_contents($this->envFilePath, implode('', $file));

			    return 'true';

			     /*return response()->json([
				     'status'  => true,
				     'message' => trans('admin.delete_succeeded'),
			     ]);*/

		       }

			return response()->json([
				'status'  => false,
				'message' => trans('admin.delete_failed'),
			]);
	}

	/**
	 * изменение строки и сохранение файла
	 * @param array $data
	 * @return bool|\Illuminate\Http\JsonResponse
	 */
	public function save(array $data = [])
	{
		$data = $data ?: $this->getAttributes();
		$file = file($this->envFilePath);

      if($file) {

	      if(isset($data['id'])) {
		      $file[$data['id']] = mb_strtoupper(trim($data['key'])) . '=' . trim($data['value']) . PHP_EOL;
	      } else {
		      $file[] = mb_strtoupper(trim($data['key'])) . '=' . trim($data['value']) . PHP_EOL;
	      }
	      file_put_contents($this->envFilePath, implode('', $file));

	             return response()->json([
	             	 'status'  => true,
		             'message' => trans('admin.save_succeeded'),
	              ]);
      }
			return response()->json([
				'status'  => false,
				'message' => trans('admin.failed'),
			]);
	}

	/**
	 * построчное чтение файла
	 * @return \Generator
	 */
	private function fileLineRead() {
		try {
    if ($handle = fopen($this->envFilePath, 'rb')) {
    	$i = 0;
        while(!feof($handle)) {
            $line = fgets($handle);
            yield $i => $line;
            $i++;
         }
	    fclose($handle);
     }
		} catch (\Exception $e) {
			throw new \LogicException('Env::getLineEnv() : '.$e->getMessage());
		}
   }

	/**
	 * @param $id
	 * @return array
	 */
	public function getLineEnv($id)
	{
		try {
			$file = file($this->envFilePath);
			--$id;
			if(isset($file) && empty($file[($id)])){
				$data = request()->all();
				return [
					'id' => $id,
					'key' => $data['key'] ?? 'NO_KEY',
					'value' => $data['value'] ?? 'NO_VALUE'
				];
			}
			$arrPart = explode('=', $file[($id)], 2);
			// поля передаем в $this->save
			return [
				'id' => $id,
				'key' => $arrPart[0],
				'value' => $arrPart[1] ?? null
			];

		} catch (\Exception $e) {
			throw new \LogicException('Env::getLineEnv() : '.$e->getMessage());
		}
	}


	/**
	 * @return array
	 */
	protected function getFullEnv(): array
	{
		try {
		// получаем объект генератора
		$arrContents = $this->fileLineRead();
		// массив данных для редактируемых ссылок
		$arrEnv = [];
		foreach ($arrContents as $key => $str) {
			// не включаем коментарии и пустые строки
			if(preg_match('/(#)/', $str) !== 1
				&& preg_match('/^([\\n\\r]+)/', $str) !== 1) {

				$arrPart = explode('=', $str, 2);
				$arrEnv[] = [
					'id'    => $key + 1,
					'key'   => $arrPart[0],
					'value' => $arrPart[1] ?? null
				];
			}
		}
		     return $arrEnv;
		} catch (\Exception $e) {
			throw new \LogicException('Env::getLineEnv() : '.$e->getMessage());
		}
	}

}
