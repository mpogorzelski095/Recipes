<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
    // Tylko te można wypełnić
    protected $fillable = [
        'title',
        'body',
        'ingredients',
        'user_id',
        'foodPic',
        'category_id'
    ];
    // protected $guarded = []; to jest taki filter, czyli czego nie przepuści
    //protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class);
        //Comment::class to to samo co App/Comment
    }
    public function user()
    {
        //$post->user->name albo $comment->post->user
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        //$post->user->name albo $comment->post->user
        return $this->belongsTo(Category::class);
    }
    public function addComment($body)
    {
        $user_id = auth()->id();
        $this->comments()->create(compact('body', 'user_id'));
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function getFoodPic()
    {
        return $this->foodPic === "foodPic.png"
            ? "/uploads/foodPic.png"
            : $this->foodPic;
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
        //Comment::class to to samo co App/Comment
    }
    public function toggleLike($userId)
    {
        $like = $this->likes()
            ->where('user_id', $userId)
            ->first();
        if ($like) {
            //            $this->likes()->detach($userId);
            $like->delete();
        } else {
            //            $this->likes()->attach($userId);
            $this->likes()->create([
                'user_id' => $userId,
                'post_id' => $this->id
            ]);
        }
    }


    public function commentsCount()
    {
        return $this->comments()
            ->selectRaw('post_id, count(*) as aggregate')
            ->groupBy('post_id');
    }



}
