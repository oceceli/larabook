<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostToTimeLineTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_post_a_text_post()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(\App\User::class)->create(), 'api');
        $response = $this->post('/api/posts', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'body' => 'testing text',
                ],
            ],
        ]);
        
        $post = \App\Post::first();

        $this->assertCount(1, \App\Post::all());
        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('testing text', $post->body);

        $response->assertCreated()
            ->assertJson([
                'data' => [
                    'type' => 'posts',
                    'post_id' => $post->id,
                    'attributes' => [
                        'body' => 'testing text',
                        'posted_by' => [
                            'data' => [
                                'attributes' => [
                                    'name' => $user->name,
                                ],
                            ],
                        ],
                    ],
                ],
                'links' => [
                    'self' => url('/posts', $post->id)
                ]
            ]);

    }
}
