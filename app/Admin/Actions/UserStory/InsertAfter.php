<?php

namespace App\Admin\Actions\UserStory;

use App\Models\UserStory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InsertAfter extends CreateChild
{
    public $name = 'Задняя вставка';

    public function handle(Model $model, Request $request)
    {
        $node = new UserStory($request->all());

        $node->insertAfterNode($model);

        return $this->response()->success('Вставить полный.')->refresh();
    }
}
