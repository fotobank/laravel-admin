<?php

namespace App\Admin\Actions;

use Artisan;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class ClearCache extends Action
{
    protected $selector = '.clear-cache';

    public function handle(Request $request)
    {
	    Artisan::call('cache:clear');
	    Artisan::call('config:clear');
	    Artisan::call('view:clear');
	    Artisan::call('route:clear');

        return $this->response()->success('Кэш удален')->refresh();
    }

    public function dialog()
    {
        $this->confirm('Вы действительно хотите удалить кэш?');
    }

    public function html()
    {
        return <<<HTML
<li>
    <a class="clear-cache" href="#">
      <i class="fa fa-trash"></i>
      <span>Очистить кэш</span>
    </a>
</li>
HTML;
    }
}
