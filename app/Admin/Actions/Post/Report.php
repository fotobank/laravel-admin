<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Report extends RowAction
{
    public $name = 'отчет';

    public function handle(Model $model, Request $request)
    {
        // $model ...

        return $this->response()->success('Success message.')->refresh();
    }

    public function form()
    {
        $type = [
            1 => 'реклама',
            2 => 'нелегальный',
            3 => 'рыболовный',
        ];
        $this->checkbox('type', 'тип')->options($type);
        $this->textarea('reason', 'причина');
    }
}
