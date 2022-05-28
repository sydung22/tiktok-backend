<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function getUsers()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'user' => $users
        ], 200);
    }

    public function getUserDetailById($id)
    {
        $user = User::with('videos', 'followings', 'followers')->withCount('videos', 'followings', 'followers')->find($id);
        if ($user) {
            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function deleteUser($id)
    {
        if (auth()->user() && auth()->user()->role == 1 && auth()->user()->id !== (int) $id) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Delete user successfully'
                ], 200);
            }
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
