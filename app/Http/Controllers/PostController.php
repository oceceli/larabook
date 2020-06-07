<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);


        $post = request()->user()->posts()->create($data['data']['attributes']);

        return response([], 201);
    }
}
