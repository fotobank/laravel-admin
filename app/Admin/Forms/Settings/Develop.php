<?php

namespace App\Admin\Forms\Settings;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Develop extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'развивать';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->radio('dev_mode', 'модель развития')->options([0 => 'близко', 1 => 'открытый'])->stacked();
        $this->radio('show_trace', 'Показать страницу Trace')->options([0 => 'нет', 1 => 'Здесь'])->stacked();
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'dev_mode'   => 1,
            'show_trace' => 1,
        ];
    }
}
