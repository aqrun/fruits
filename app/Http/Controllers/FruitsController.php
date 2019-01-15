<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Transformers\FruitsTransformer;
use Illuminate\Http\Request;

class FruitsController extends BaseController
{
    public function index()
    {
        $fruits = Fruit::all();

        //return $this->response->array(['data' => $fruits], 200);

        return $this->response->collection($fruits, new FruitsTransformer);
    }

    public function show($id)
    {
        $fruit = Fruit::where('id', $id)->first();

        if($fruit) {
            return $this->response->item($fruit, new FruitsTransformer());
        }

        return $this->response->errorNotFound();
    }
}
