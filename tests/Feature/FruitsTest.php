<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FruitsTest extends TestCase
{

    use DatabaseMigrations;


    /**
     * @test
     *
     * Test: GET /api
     */
    public function testItPraisesTheFruits()
    {
        $this->get('/api')
            ->assertJson([
                'Fruits' => 'Delicious and healthy!'
            ]);
    }

    /**
     * @test
     *
     * Test: GET /api/fruits
     */
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

    /**
     * @test
     *
     * Test: GET /api/fruit/1
     */
    public function testFetchesASingleFruit()
    {
        $this->seed('FruitsTableSeeder');

        $this->get('/api/fruit/1')
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'name' => "Apple",
                    'color' => "Green",
                    'weight' => '150 grams',
                    'delicious' => true
                ]
            ]);
    }

}
