<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Image;
use Imgur;
class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
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
