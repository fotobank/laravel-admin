<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use App\Models\Post;

class StarPost extends RowAction
{
    public $name = 'Плюс штраф';

    protected $success = 'Плюс штраф успех';

    protected $confirm = 'Подтверждение плюс штраф статьи？';

    public function handle(Post $post)
    {
        $post->toggleStar();

        return $this->response()->success($this->success)->refresh();
    }

    public function dialog()
    {
        $this->text($this->confirm);
    }
}
