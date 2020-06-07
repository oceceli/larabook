<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\DefaultResources;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
                ],
            ],
            'links' => [
                'self' => url($this->getPath())
            ],
        ];
    }
}
