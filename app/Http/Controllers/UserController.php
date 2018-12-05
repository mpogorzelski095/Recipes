<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Image;
use Imgur;
use App\Post;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function showuser(User $user){
//        dd($user);
//        $posts = Post::where('user_id','=',Auth::user()->id)->paginate(5);
        $posts = Post::where('user_id', '=', $user->id)->paginate(5);
        return view('userprofile', compact('user', 'posts'));
    }


    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $image = Imgur::upload($avatar);
            $user = Auth::user();
            $user->avatar = $image->link();
            $user->save();
        }
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
