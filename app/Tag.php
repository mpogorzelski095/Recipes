<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    //Aby można było tworzyć linki bardziej user-friendly
    public function getRouteKeyName()
    {
        return 'name';
    }
}
