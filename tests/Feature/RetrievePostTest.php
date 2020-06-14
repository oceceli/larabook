<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_retrieve_posts()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(\App\User::class)->create(), 'api');
        $posts = factory(\App\Post::class, 2)->create(['user_id' => $user->id]);

        $response = $this->get('/api/posts');

        $response->assertOk()
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->last()->id,
                            'attributes' => [
                                'body' => $posts->last()->body,
                                'posted_at' => Carbon::parse($posts->first()->created_at)->diffForHumans(),
                                'image' => $posts->last()->image,
                            ]
                        ],
                    ],
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->first()->id,
                            'attributes' => [
                                'body' => $posts->first()->body,
                                'posted_at' => Carbon::parse($posts->last()->created_at)->diffForHumans(),
                                'image' => $posts->first()->image,
                            ]
                        ],
                    ],
                    
                ],
                'links' => [
                    'self' => url('/posts'),
                ],
            ]);
    }


    /**
     * @test
     */
    public function a_user_can_only_retrieve_their_posts()
    {
        $this->actingAs($user = factory(\App\User::class)->create(), 'api');
        $posts = factory(\App\Post::class)->create();

        $response = $this->get('/api/posts');

        $response->assertOk()
            ->assertExactJson([
                'data' => [],
                'links' => [
                    'self' => url('/posts'),
                ]
            ]);
    }


}
