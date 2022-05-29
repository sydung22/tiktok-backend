<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function getStatistics()
    {
        //
        $top_videos_most_views = Video::orderBy('views', 'desc')->take(5)->get();
        $top_videos_most_likes = Video::withCount('likes')->orderBy('likes_count', 'desc')->take(5)->get();
        $top_users_most_working = User::orderBy('coins', 'desc')->take(5)->get();
        $top_users_most_follows = User::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get();
        return response()->json([
            'status' => 'success',
            'data' => [
                'top_videos_most_views' => $top_videos_most_views,
                'top_videos_most_likes' => $top_videos_most_likes,
                'top_users_most_working' => $top_users_most_working,
                'top_users_most_follows' => $top_users_most_follows,
            ],
        ], 200);
    }
}
