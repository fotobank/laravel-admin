<?php

namespace App\Admin\Actions\MobilePhone;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Copy extends RowAction
{
    public $name = 'копия';

    public function handle(Model $model)
    {
        $model->replicate()->save();

        return $this->response()->success('Success message.')->refresh();
    }

}
