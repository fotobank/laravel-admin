<?php

namespace App\Http\Controllers;

use Encore\Admin\Config\ConfigModel;
//use Encore\Admin\Grid;
use Fotobank\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Config\ConfigController;
use function trans;

class AdminConfigController extends ConfigController
{

	/**
	 * Index interface.
	 *
	 * @return Content
	 */
	public function index(Content $content)
	{
		return $content
			->header(trans('config.header'))
			->description(trans('config.description'))
			->body($this->grid());
	}

	public function grid()
	{
		$grid = new Grid(new ConfigModel());

		$grid->id(trans('admin.id'))->sortable();
		$grid->name(trans('admin.name'))->display(function ($name) {
			return "<a tabindex=\"0\" class=\"btn btn-xs btn-twitter\" role=\"button\" data-toggle=\"popover\" data-html=true title=\"Usage\" data-content=\"<code>config('$name');</code>\">$name</a>";
		});
		$grid->value(trans('admin.value'))->editable();
		$grid->description(trans('admin.description'))->editable();

		$grid->created_at(trans('admin.created_at'));
		$grid->updated_at(trans('admin.updated_at'));

		$grid->filter(function ($filter) {
			$filter->disableIdFilter();
			$filter->like(trans('admin.name'));
			$filter->like(trans('admin.value'));
		});

		return $grid;
	}
}
