<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use Auth;
use App\Tag;
use Image;
use Imgur;

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

    public function favorite(Post $post){
        $posts = Post::where('user_id','=',Auth::user()->id)->paginate(5);

        return view('posts.mypost', compact('posts'));
    }

    public function show(Post $post){
      return view('posts.show', compact('post'));
    }

    public function tags(Post $post){
        return view('posts.tags', compact('post'));
    }

    public function create(){

        $tags = Tag::all();
//        dd($tags);
        return view('posts.create', compact('tags'));
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



    public function store(Request $request){

//        dd($request->all());
      $this->validate(request(), [
        'title' => 'required|min:5|max:25',
        'body' => 'required|min:5|max:10000', 'tag' => 'required',
        'foodPic' => 'required',
      ]);


      //Create a new post using request data

            // $post = new Post;
            // $post->title = request('title');
            // $post->body = request('body');




        if ($request->hasFile('foodPic')) {
            $foodPic = $request->file('foodPic');
            $image = Imgur::upload($foodPic);


            $post = Post::create([
                'body' => request('body'),
                'title' => request('title'),
                'user_id' => Auth::user()->id,
                'foodPic' => $image->link(),

            ]);

        }

        $post->tags()->attach(request('tag'));
      //Można fajniej
//      auth()->user()->publish(
//        new Post(request(['title','body','tag']))
//      );
        session()->flash('message', 'You have successfully added the recipe!');
//        flash('asdads');
      // Redirect to the home pages
      return redirect('/');
    }


    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }


}
