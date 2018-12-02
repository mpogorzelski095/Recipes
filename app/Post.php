<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
    // Tylko te można wypełnić
    protected $fillable = ['title', 'body', 'user_id'];
    // protected $guarded = []; to jest taki filter, czyli czego nie przepuści
    //protected $guarded = [];
    public function comments() {
      return $this->hasMany(Comment::class);
      //Comment::class to to samo co App/Comment
    }

    public function user(){ //$post->user->name albo $comment->post->user
      return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
      $user_id = auth()->id();
      $this->comments()->create(compact('body', 'user_id'));
    }
}
