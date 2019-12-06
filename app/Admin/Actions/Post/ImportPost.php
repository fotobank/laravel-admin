<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class ImportPost extends Action
{
    public $name = 'Импорт данных';

    protected $selector = '.import-post';

    public function handle(Request $request)
    {
        // Следующий код получает, чтобы загрузить файл, а затем использовать `maatwebsite / excel` и другие пакеты для обработки загрузки файлов, сохраненных в базе данных
        $request->file('file');

        return $this->response()->success('Импорт завершен！')->download('http://laravel-admin.test/demo/users');
    }

    public function form()
    {
        $this->file('file', 'Пожалуйста, выберите файл');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-post"><i class="fa fa-upload"></i>Импорт данных</a>
HTML;
    }
}
