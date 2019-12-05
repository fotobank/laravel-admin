<?php

namespace App\Admin\Actions\Document;

use Encore\Admin\Actions\RowAction;
use App\Models\Document;

class CloneDocument extends RowAction
{
    public $name = 'копия';

    public function handle(Document $document)
    {
        $document->replicate()->save();

        return $this->response()->success('Скопировано успешно')->refresh();
    }

    public function dialog()
    {
        $this->confirm('Подтверждение копирования?');
    }
}