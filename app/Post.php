<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];


    public function getPath()
    {
        return 'posts/' . $this->id;
    }


}

