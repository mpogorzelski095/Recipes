<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Auth;
class CommentsController extends Controller
{
  public function store(Post $post){
    $this->validate(request(), ['body' => 'required|min:2']);

    $post->addComment(request('body'), $post);

    //$post->addComment(request('body');
    return back();
  }
}
