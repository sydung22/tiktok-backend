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
        $user = User::with('videos')->withCount('videos')->find($id);
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
}
