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

    public function follow() {
        return $this->BelongsToMany( 'App\User', 'followers' ,'follower_id', 'user_id');
    }
    function followers()
    {
        return $this->belongsToMany(
            'App\User',
            'followers',
            'user_id',
            'follower_id'
        )->withTimestamps();
    }

    public function toggleFollow($followerId)
    {
        $alreadyFollows = $this->followers()
            ->where('follower_id', $followerId)
            ->first();
        if ($alreadyFollows) {
            $this->followers()->detach($followerId);
        } else {
            $this->followers()->attach($followerId);
        }
    }
}
