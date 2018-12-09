<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\User;
class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
//        $categories = Category::pluck('name');
        return view('posts.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        $like = $category->posts()->withCount('likes')->orderBy('likes_count', 'desc')->first();
        $comment = $category->posts()->withCount('comments')->orderBy('comments_count', 'desc')->first();

        $new = $category->posts()->orderBy('created_at', 'desc')->first();

        $posts = $category->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.postsFromCategory', compact('posts','like', 'comment', 'new'));
    }
}
