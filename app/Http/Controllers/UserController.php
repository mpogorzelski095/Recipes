<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Image;
use Imgur;
use App\Post;
use App\User;
use App\Notifications\UserFollowed;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('users.index', compact('users'));
    }
    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);
            // sending a notification
            $user->notify(new UserFollowed($follower));
            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }














    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function showuser(User $user)
    {
        //        dd($user);
        //        $posts = Post::where('user_id','=',Auth::user()->id)->paginate(5);

        if($user->id == Auth::user()->id){
            $user = Auth::user();
            return view('profile', compact('user'));
        }else{
            $posts = Post::where('user_id', '=', $user->id)->paginate(5);
            $followers = $user->followers;
            return view('userprofile', compact('user', 'posts', 'followers'));
        }

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

    public function toggleFollow()
    {
        $user = User::find(request('userId'));
        $user->toggleFollow(auth()->id());
        return response()->json([
            'currentNumberOfFollowers' => $user->followers()->count()
        ]);
    }
}
