<?php

namespace App\Admin\Forms\Settings;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Upload extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Загрузить';

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
        $this->number('file_size', 'Файл предельного размера загрузки')->help('От 0 до не ограничивают размер блока：kb')->rules('required');
        $this->tags('file_ext', 'Разрешить расширение файла загрузки')->help('Другие суффиксы, разделенные запятыми, не заполняют ограничения типа')->rules('required');
        $this->number('image_size', 'Picture предельного размера загружаемых')->help('От 0 до не ограничивают размер блока：kb')->rules('required');
        $this->tags('image_ext', 'Разрешить загружать фотографии суффикс')->help('Другие суффиксы, разделенные запятыми, не заполняют ограничения типа')->rules('required');
        $this->number('thumbnail_size', 'размер миниатюр');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'file_size'       => 100,
            'file_ext'      => ['doc', 'docx', 'xls', 'ppt', 'pptx', 'pdf', 'wps', 'txt', 'rar', 'zip', 'gz', 'bz2', '7z'],
            'image_size'       => 100,
            'image_ext'      => ['gif', 'bmp', 'jpeg', 'png'],
        ];
    }
}
