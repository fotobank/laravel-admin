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

use Tests\Liberator;
use Tests\TestCase;

class EnvTest extends TestCase
{

	public function testResponse1()
	{
		$response = $this->get('admin/auth/login');
		$response->assertStatus(200);
	}
	public function testResponse2()
	{
		$response = $this->get('admin/env/manager');
		$response->assertStatus(302);
	}

	public function testFile()
	{
		$this->assertFileExists('O:\domains\laravel-admin/.env');
		$this->assertFileIsReadable('O:\domains\laravel-admin/.env');
	}

	public function test__construct ()
	{
		$this->assertClassHasAttribute('envFilePath', Env::class);
		$objEnv = new Env();
		$this->assertAttributeNotEmpty('envFilePath',
			$objEnv,'Свойство $envFilePath пустое');

		// для protected и private свойства
		$envObject = new Liberator(new Env());
		$this->assertEquals('O:\domains\laravel-admin/.env', $envObject->envFilePath);

		return $envObject;

	}
	/**
	 *  проверяем protected функцию getEnv()
	 *  первой строкой в .env должно быть APP_NAME=значение
	 *  @depends test__construct
	 */
	public function testGetEnv($envObject) {

		$arr = $envObject->getEnv(0);
		$this->assertEquals('APP_NAME', $arr['key']);
	}

	/**
	 * @depends test__construct
	 */
	public function testSave($envObject)
	{
		$id = 0;
		$arr1 = $envObject->getEnv($id);

		$data = $arr1;
		// проверка записи данных
		$data['id'] = $id+1;
		$data['name'] = 'value';
		$this->assertTrue($envObject->save($data) , 'ошибка записи value');
		// проверка записи ключа
		$data['name'] = 'key';
		$data['value'] = $arr1['key'];
		$this->assertTrue($envObject->save($data) , 'ошибка записи key');

		$arr2 = $envObject->getEnv($id);
		$this->assertEquals($arr1, $arr2, 'ошибка в данных');

	}

	/**
	 * @depends test__construct
	 */
	public function testFindOrFail($envObject)
	{
		$model = $envObject->findOrFail(1);
		$this->assertInstanceOf(\Illuminate\Database\Eloquent\Model::class, $model);
	}

	/**
	 * @depends test__construct
	 */
	public function testPaginate($envObject)
	{
		$model = $envObject->paginate();
		$this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $model);
	}

	/**
	 * @depends test__construct
	 */
	public function testDelete($envObject)
	{
		$this->assertTrue($envObject->delete() , 'ошибка удаления записи в .env');
	}

}
