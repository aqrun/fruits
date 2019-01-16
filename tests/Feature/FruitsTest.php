<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use JWTAuth;
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

    /**
     * @test
     *
     * Test: GET /api/authenticate
     */
    public function testAuthenticateAUser()
    {
        $user = factory(\App\Models\User::class)->create(['password' => bcrypt('foo')]);

        $this->post('/api/authenticate', [
            'email' => $user->email,
            'password' => 'foo'
            ])
            ->assertJsonStructure(['token']);
    }

    /**
     * @test
     *
     * Test: POST /api/fruits
     */
    public function testSaveAFruit()
    {
        $user = factory(User::class)->create(['password' => bcrypt('foo')]);
        $fruit = [
            'name' => 'peache', 'color' => 'peache', 'weight' => 175, 'delicious' => true
        ];

        $response = $this->json('POST', '/api/fruits',$fruit, $this->headers($user));

        $response->assertStatus(201);

    }

    /**
     * return request headers needed to interact with the api
     *
     * @return Array arry of headers
     */
    protected function headers($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if(!is_null($user)){
            $token = JWTAuth::fromUser($user);
            JWTAuth::setToken($token);
            $headers['Authorization'] = 'Bearer '. $token;
        }

        return $headers;
    }

}
