<?php

namespace App\Admin\Actions\UserStory;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = 'копия';

    public function handle(Model $model)
    {
        $new = $model->replicate();

        $new->parent_id = $model->parent_id;

        $new->save();

        return $this->response()->success('Скопировано успешно.')->refresh();
    }

}
