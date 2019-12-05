<?php

namespace App\Admin\Actions\UserStory;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class MoveUp extends RowAction
{
    public $name = 'Переместить вверх';

    public function handle(Model $model)
    {
        $model->up();

        return $this->response()->success('Этот шаг завершен.')->refresh();
    }

}
