<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'cover', 'description', 'views', 'user_id', 'type', 'share_user_id', 'share_description'];

    protected $with = ['user', 'hashtags', 'comments', 'likes', 'shareUser'];
    protected $withCount = ['likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function shareUser()
    {
        return $this->belongsTo(User::class, 'share_user_id');
    }
}
