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
    public function __construct()
    {
        $this->middleware('auth');
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
        $posts = Post::where('user_id', '=', $user->id)->paginate(5);
        $followers = $user->followers;
        return view('userprofile', compact('user', 'posts', 'followers'));
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
    /**
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function follow(int $profileId)
    {
        $user1 = User::find($profileId);
        //        if(! $user) {
        //            return redirect()->back();
        //        }
        //        $user->followers()->attach(auth()->user()->id);
        $user = Auth::user();
        $user1->follow($user);
        return redirect()->back();
    }
    public function unfollow(int $profileId)
    {
        $user1 = User::find($profileId);
        //        if(! $user) {
        //
        //            return redirect()->back();
        //        }
        //        $user->followers()->attach(auth()->user()->id);
        $user = Auth::user();
        $user1->unfollow($user);
        return redirect()->back();
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
