<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;
    public function posts()
    {
        return $this->hasMany(Post::class);
        //Comment::class to to samo co App/Comment
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }
    public function getUsersAvatar()
    {
        return $this->avatar === "default.jpg"
            ? "/uploads/avatars/default.jpg"
            : $this->avatar;
    }
    public function favoritePosts()
    {
        $postIds = $this->likes()
            ->where('user_id', Auth::user()->id)
            ->pluck('post_id');
        $favoritePosts = collect(Post::findMany($postIds));
        return $favoritePosts;
    }

//    public function follow() {
//        return $this->BelongsToMany( 'App\User', 'followers' ,'follower_id', 'user_id');
//    }
//    function followers()
//    {
//        return $this->belongsToMany(
//            'App\User',
//            'followers',
//            'user_id',
//            'follower_id'
//        )->withTimestamps();
//    }


    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
            ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
            ->withTimestamps();
    }
    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first(["users.id"]);
    }






//    public function toggleFollow($followerId)
//    {
//        $alreadyFollows = $this->followers()
//            ->where('follower_id', $followerId)
//            ->first();
//        if ($alreadyFollows) {
//            $this->followers()->detach($followerId);
//        } else {
//            $this->followers()->attach($followerId);
//        }
//    }
}
