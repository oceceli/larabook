<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\DefaultResources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    // use DefaultResources;

    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'posts',
                'post_id' => $this->id,
                'attributes' => [
                    'body' => $this->body,
                    'posted_by' => new User($this->user),
                    'image' => $this->image,
                    'posted_at' => $this->created_at->diffForHumans(),
                ],
            ],
            'links' => [
                'self' => $this->getPath(),
            ],
        ];
    }
}
