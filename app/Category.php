<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
        //Comment::class to to samo co App/Comment
    }
    //Aby można było tworzyć linki bardziej user-friendly
    public function getRouteKeyName()
    {
        return 'name';
    }
}
