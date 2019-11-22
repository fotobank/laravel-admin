<?php

namespace App\Http\Controllers;

use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;

class EchartsController extends Controller
{
	public function index(Content $content)
	{
		return $content
			->header('Echarts')
			->body(new Box('echarts demo', view('admin.echarts')));
	}
}
