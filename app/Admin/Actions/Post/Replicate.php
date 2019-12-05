<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = 'копия';

    public function handle(Model $model)
    {
        $model->replicate()->save();

        return $this->response()->success('Скопировано успешно.')->refresh();
    }

    public function dialog()
    {
        $this->confirm('OK Копировать？');
    }
}
