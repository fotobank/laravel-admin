<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class Restore extends BatchAction
{
    public $name = 'восстановление данных';

    public function handle(Collection $collection)
    {
        return $this->response()->success($collection->keys())->refresh();
    }

    public function dialog()
    {
        $this->confirm('Преисполнен решимости восстановить его？');
    }
}
