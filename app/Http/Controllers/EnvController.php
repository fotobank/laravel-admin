<?php

namespace App\Http\Controllers;

use App\Env;
//use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
//use Encore\Admin\Grid;
use Fotobank\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;



class EnvController extends Controller
{

	// модель Env()
	protected $env;

	public function __construct ()
	{
		$this->env = new Env();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update($id)
	{
		return $this->form()->update($id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return mixed
	 */
	public function store()
	{
		return $this->form()->store();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		return $this->env->deleteLines($id);
//		return $this->form()->destroy($id);
	}

	public function index(Content $content)
	{
		return $content
			->header(__('env.title'))
			->description(__('env.description'))
			->body($this->grid());
	}


	/**
	 * Show interface.
	 *
	 * @param mixed $key
	 * @param Content $content
	 * @return Content
	 */
	public function show($key, Content $content)
	{
		return $content
			->header(__('env.detail'))
			->description(__('env.description'))
			->body($this->detail($key));
	}


	/**
	 * Edit interface.
	 *
	 * @param $key
	 * @return Content
	 */
	public function edit($key, Content $content)
	{
		$content->header(__('env.title'));
		$content->description(__('env.description'));
		$content->body($this->form()->edit($key));
		return $content;
	}


	/**
	 * Create interface.
	 *
	 * @param Content $content
	 * @return Content
	 */
	public function create(Content $content)
	{
		return $content
			->header(__('env.create'))
			->description(__('env.description'))
			->body($this->form());
	}


	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid()
	{
		$grid = new Grid(new Env());
		$grid->key( __('env.key'))->editable();
		$grid->value(__('env.value'))->editable();
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $key
	 * @return Show
	 */
	protected function detail($key)
	{
		$env = new Env();
		$show = new Show($env->findOrFail($key));

		$show->key( __('env.key'));
		$show->value(__('env.value'));

		return $show;
	}

	protected function form()
	{
		$form = new Form(new Env());
		$form->text('key', __('env.key'));
		$form->text('value', __('env.value'));
		return $form;
	}
}
