<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use App\Models\Post;

class PinPost extends RowAction
{
    public $name = 'липкий';

    protected $success = 'Top Success';

    protected $confirm = 'Подтвердите липкие статьи？';

    public function handle(Post $post)
    {
        $post->togglePin();

        return $this->response()->toastr()->success($this->success)->refresh();
    }

    public function dialog()
    {
        $this->confirm($this->confirm);
    }
}
