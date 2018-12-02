<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Tylko te można wypełnić
    protected $fillable = ['body', 'user_id', 'post_id'];
    //protected $guarded = []; //to jest taki filter, czyli czego nie przepuści

    public function post(){
      return $this->belongsTo(Post::class);
    }
    public function user(){ //$comment->user->name
      return $this->belongsTo(User::class);
    }
}
