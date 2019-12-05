<?php

namespace App\Admin\Actions\Post;

class UnStarPost extends StarPost
{
    protected $success = 'Отменено плюс штраф';

    protected $confirm = 'Отмена плюс штраф статьи？';

    protected $icon = 'star';
}
