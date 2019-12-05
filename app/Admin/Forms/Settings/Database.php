<?php

namespace App\Admin\Forms\Settings;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Database extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'база данных';

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
        $this->text('path', 'Корневой путь')->rules('required')->help('Путь должен заканчиваться /');
        $this->text('backup_size', 'Резервное копирование размер тома')->rules('required')->help('Это значение представляет собой максимальную длину суб-объема для ограничения сжатия. блок：B；Рекомендуемые настройки 20M');
        $this->radio('zip', 'Если сжатие резервных копий')->options([1 => 'Здесь', 0 => 'нет'])->help('Сжатые файлы резервного копирования необходимо PHP Экологическая поддержка gzopen, gzwrite функция');
        $this->radio('zip_level', 'Уровень Сжатие резервных копий')->options([1 => 'низший', 2 => 'общий', 3 => 'наивысший'])->help('База данных уровня сжатия резервных копий файлов, конфигурация вступает в силу, когда сжатие включено');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'path'        => '../data/',
            'backup_size' => '20971520',
            'zip'         => 1,
            'zip_level'   => 2,
        ];
    }
}
