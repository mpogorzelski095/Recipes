<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Tag;
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
        //return $tag->posts
        $posts = $category->posts()->paginate(5);

        return view('posts.index', compact('posts'));
    }
}
