<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FruitsTest extends TestCase
{

    use DatabaseMigrations;


    public function testItPraisesTheFruits()
    {
        $this->get('/api')
            ->assertJson([
                'Fruits' => 'Delicious and healthy!'
            ]);
    }

    public function testFetchesFruits()
    {
        $this->seed('FruitsTableSeeder');
        $this->get('api/fruits')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'name', 'color', 'weight', 'delicious'
                    ]
                ]
            ]);
    }

}
