<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index']);
    }

    public function index(){
      //$posts = Post::all();
      $posts = Post::latest()->paginate(5);
      return view('posts.index', compact('posts'));
    }
    public function mypost(Post $post){
      $posts = Post::where('user_id','=',Auth::user()->id)->paginate(5);

      return view('posts.mypost', compact('posts'));
    }

    public function show(Post $post){
      return view('posts.show', compact('post'));
    }

    public function create(){
      return view('posts.create');
    }
    public function edit($id)
    {

        $post = Post::find($id);


        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request){
      $this->validate(request(), [
        'title' => 'required|min:5|max:25',
        'body' => 'required|min:5|max:10000',
      ]);

      $post->update($request->all());
      return redirect("/posts/$post->id");
    }

    public function destroy(Post $post)
    {
     $post->delete();

     return redirect("/mypost");
    }



    public function store(){

      $this->validate(request(), [
        'title' => 'required|min:5|max:25',
        'body' => 'required|min:5|max:10000',
      ]);
      //Create a new post using request data

            // $post = new Post;
            // $post->title = request('title');
            // $post->body = request('body');

      // Post::create([
      //   'body' => request('body'),
      //   'title' => request('title'),
      //   'user_id' => Auth::user()->id
      // ]);
      //Można fajniej
      auth()->user()->publish(
        new Post(request(['title','body']))
      );

      // Redirect to the home pages
      return redirect('/');
    }
}
