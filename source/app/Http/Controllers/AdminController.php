<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getStatistics']]);
    }

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

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        if (auth()->user() && auth()->user()->role === 1) {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->fullname = $request->fullname;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
            if ($user->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'User successfully registered',
                    'user' => $user
                ], 201);
            }
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
