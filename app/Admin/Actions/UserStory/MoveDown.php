<?php

namespace App\Admin\Actions\UserStory;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class MoveDown extends RowAction
{
    public $name = 'вниз';

    public function handle(Model $model)
    {
        $model->down();

        return $this->response()->success('Этот шаг завершен.')->refresh();
    }

}
