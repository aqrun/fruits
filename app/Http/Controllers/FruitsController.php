<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitsController extends BaseController
{
    public function index()
    {
        $fruits = Fruit::all();

        return $this->response->array(['data' => $fruits], 200);
    }
}
