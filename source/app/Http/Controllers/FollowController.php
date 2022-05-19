<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['follow']]);
    }

    public function follow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        if (auth()->user() && auth()->user()->id !== $request->user_id) {
            $follow = Follow::where('user_id_1', auth()->user()->id)->where('user_id_2', $request->user_id)->first();
            if ($follow) {
                $follow->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Unfollow successfully'
                ], 200);
            } else {
                $follow = new Follow();
                $follow->user_id_1 = auth()->user()->id;
                $follow->user_id_2 = $request->user_id;
    
                if ($follow->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Follow successfully',
                    ], 201);
                }
            }
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
