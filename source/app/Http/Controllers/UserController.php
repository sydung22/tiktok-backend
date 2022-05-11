<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $user = User::where('email', $request->email)->orWhere('username', $request->username);
        if (!$user) {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->fullname = $request->fullname;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->password = md5($request->password);
            if ($user->save()) {
                return response()->json([
                    'success'   => true,
                    'message'   => 'User created successfully',
                    'data'      => $user
                ]);
            }
        }
    }
}
