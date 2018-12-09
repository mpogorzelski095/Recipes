<?php

namespace App\Http\Controllers;

use App\Category;
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
        $option = request()->input('sort');
        if(request()->has('sort')){
            if($option == 1)
                $posts = Post::latest()->paginate(5)->appends('sort', request('sort'));
            elseif($option == 2)
                $posts = Post::oldest()->paginate(5)->appends('sort', request('sort'));
            elseif($option == 3)
                $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(5)->appends('sort', request('sort'));
            elseif($option == 4)
                $posts = Post::withCount('comments')->orderBy('comments_count', 'desc')->paginate(5)->appends('sort', request('sort'));
            else
                $posts = Post::latest()->paginate(5);
        }else{
            $posts = Post::latest()->paginate(5);
        }

      //$posts = Post::all();

      $like = Post::withCount('likes')->orderBy('likes_count', 'desc')->first();
      $comment = Post::withCount('comments')->orderBy('comments_count', 'desc')->first();
      $follow = User::withCount('followers')->orderBy('followers_count', 'desc')->first();
      return view('posts.index', compact('posts','like', 'comment', 'follow'));
    }
    public function mypost(Post $post){

      $posts = Post::where('user_id','=',Auth::user()->id)->paginate(5);

      return view('posts.mypost', compact('posts'));
    }

    public function favorite(Post $post){
        $posts = Auth::user()->favoritePosts();

        return view('posts.favorite', compact('posts'));
    }

    public function show(Post $post){
      return view('posts.show', compact('post'));
    }

    public function tags(Post $post){
        return view('posts.tags', compact('post'));
    }

    public function create(){
        $categories = Category::all();
//       dd($categories);
        return view('posts.create', compact('categories'));
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
        'body' => 'required|min:5|max:10000', 'category' => 'required',
        'foodPic' => 'required', 'ingredients' => 'required',
      ]);


      //Create a new post using request data

            // $post = new Post;
            // $post->title = request('title');
            // $post->body = request('body');




        if ($request->hasFile('foodPic')) {
            $foodPic = $request->file('foodPic');
            $image = Imgur::upload($foodPic);


            Post::create([
                'body' => request('body'),
                'ingredients' => request('ingredients'),
                'title' => request('title'),
                'user_id' => Auth::user()->id,
                'foodPic' => $image->link(),
                'category_id' => request('category'),
            ]);

        }




        //Tak było z tagami:
//        $this->validate(request(), [
//            'title' => 'required|min:5|max:25',
//            'body' => 'required|min:5|max:10000', 'tag' => 'required', 'category' => 'required',
//            'foodPic' => 'required',
//        ]);
//
//
//        //Create a new post using request data
//
//        // $post = new Post;
//        // $post->title = request('title');
//        // $post->body = request('body');
//
//
//
//
//        if ($request->hasFile('foodPic')) {
//            $foodPic = $request->file('foodPic');
//            $image = Imgur::upload($foodPic);
//
//
//            $post = Post::create([
//                'body' => request('body'),
//                'title' => request('title'),
//                'user_id' => Auth::user()->id,
//                'foodPic' => $image->link(),
//                'category_id' => request('category'),
//            ]);
//
//        }
//
//        $post->tags()->attach(request('tag'));






      //Można fajniej
//      auth()->user()->publish(
//        new Post(request(['title','body','tag']))
//      );
        session()->flash('message', 'You have successfully added the recipe!');
//        flash('asdads');
      // Redirect to the home pages
      return redirect('/');
    }

    public function toggleLike()
    {
        $post = Post::find(request('postId'));
        $post->toggleLike(auth()->id());
        return response()->json([
            'currentNumberOfLikes' => $post->likes()->count()
        ]);
    }
}
