<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use App\Models\Post;

class CopyPost extends RowAction
{
    public $name = 'копия';

    public function handle(Post $post)
    {
        $post->replicate()->save();

        return $this->response()->success('Скопировано успешно')->refresh();
    }
}
