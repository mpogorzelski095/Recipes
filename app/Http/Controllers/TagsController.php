<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use Auth;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::pluck('name');
        return view('posts.tags', compact('tags'));
    }

    public function show(Tag $tag)
    {
        //return $tag->posts
        $posts = $tag->posts()->paginate(5);

        return view('posts.index', compact('posts'));
    }
}
