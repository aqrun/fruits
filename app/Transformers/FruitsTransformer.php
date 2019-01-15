<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Fruit;

class FruitsTransformer extends TransformerAbstract
{
    public function transform(Fruit $fruit)
    {
        return [
            'id' => (int) $fruit->id,
            'name' => ucfirst($fruit->name),
            'color' => ucfirst($fruit->color),
            'weight' => $fruit->weight . ' grams',
            'delicious' => (bool) $fruit->delicious,
        ];
    }
}