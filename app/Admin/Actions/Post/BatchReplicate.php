<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchReplicate extends BatchAction
{
    public $name = 'Bulk Copy';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            $model->replicate()->save();
        }

        return $this->response()->success('Скопировано успешно.')->refresh();
    }
}
