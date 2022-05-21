<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'cover', 'description', 'views', 'user_id'];

    protected $with = ['user', 'hashtags'];
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
}
