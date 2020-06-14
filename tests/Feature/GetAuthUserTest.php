<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAuthUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function authenticated_user_can_be_fetched()
    {
        $this->withExceptionHandling();
        
        $this->actingAs($user = factory(\App\User::class)->create(), 'api');
        
        $response = $this->get('/api/auth-user');

        $response->assertOk()
            ->assertJson([
                'data' => [
                    'user_id' => $user->id,
                    'attributes' => [
                        'name' => $user->name,
                    ]
                ],
                'links' => [
                    'self' => url('/users/' . $user->id),
                ],
            ]);
    }
}
