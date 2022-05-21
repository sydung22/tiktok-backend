<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 5,
            'user' => auth()->user()
        ]);
    }

    public function changePassWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' =>  [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Password is incorrect');
                    }
                },
            ],
            'new_password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $userId = auth()->user()->id;
        if (User::where('id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        )) {
            return response()->json([
                'status' => 'success',
                'message' => 'User successfully changed password',
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'string|between:2,100',
            'fullname' => 'string|between:2,100',
            'age' => 'integer',
            'gender' => 'string',
            'avatar' => 'string',
            'description' => 'string',
            'facebook' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $user = User::find(auth()->user()->id);
        if (!empty($request->username)) {
            $user->username = $request->username;
        }
        
        if (!empty($request->fullname)) {
            $user->fullname = $request->fullname;
        }

        if (!empty($request->age)) {
            $user->age = $request->age;
        }

        if (!empty($request->description)) {
            $user->description = $request->description;
        }

        if (!empty($request->facebook)) {
            $user->facebook = $request->facebook;
        }

        if (!empty($request->gender)) {
            $user->gender = $request->gender;
        }

        if (!empty($request->file('avatar'))) {
            $uploadedAvatarUrl = cloudinary()->uploadFile($request->file('avatar')->getRealPath())->getSecurePath();
            $user->avatar = $uploadedAvatarUrl;
        }

        if ($user->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Update user successfully',
                'user' => $user
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
