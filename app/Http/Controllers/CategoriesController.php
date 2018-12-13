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
        $categories = Category::all();
//        $categories = Category::pluck('name');

        return view('posts.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = $category->posts()->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('posts.postsFromCategory', compact('posts'));
    }
}

