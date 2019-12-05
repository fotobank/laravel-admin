<?php

namespace App\Admin\Actions\Post;

class UnpinPost extends PinPost
{
    public $name = 'неприклеенный';

    protected $success = 'Unstuck успех';

    protected $confirm = 'Подтверждение Unstuck？';
}
