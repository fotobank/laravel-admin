<?php

namespace App\Admin\Actions\UserStory;

use App\Models\UserStory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InsertBefore extends CreateChild
{
    public $name = 'передняя вставка';

    public function handle(Model $model, Request $request)
    {
        $node = new UserStory($request->all());

        $node->insertBeforeNode($model);

        return $this->response()->success('Вставить полный.')->refresh();
    }
}
