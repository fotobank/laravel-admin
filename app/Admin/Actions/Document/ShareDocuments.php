<?php

namespace App\Admin\Actions\Document;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class ShareDocuments extends BatchAction
{
    public $name = 'Обмен документами';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            // ...
        }

        return $this->response()->success('успех Sharing')->refresh();
    }

    public function dialog()
    {
        $this->confirm('Волевые обмениваться документами？');
    }
}
