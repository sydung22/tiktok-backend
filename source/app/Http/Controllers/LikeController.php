<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Like;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Reply;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['checkHasLike']]);
    }
    //
    public function like(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_id' => 'required_without_all:comment_id,reply_id',
            'comment_id' => 'required_without_all:video_id,reply_id',
            'reply_id' => 'required_without_all:video_id,comment_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $like = new Like;
        $like->user_id = auth()->user()->id;

        if ($request->video_id) {
            $like = Like::where([
                'user_id' => auth()->user()->id,
                'likeable_id' => $request->video_id,
                'likeable_type' => Video::class
            ])->first();

            if ($like) {
                $like->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Unlike successfully'
                ], 200);
            } else {
                $like = new Like;
                $like->likeable_id = $request->video_id;
                $like->likeable_type = Video::class;
                $like->user_id = auth()->user()->id;
                if ($like->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Create like successfully',
                        'user' => $like
                    ], 201);
                }
            }
        } elseif ($request->comment_id) {
            $like = Like::where([
                'user_id' => auth()->user()->id,
                'likeable_id' => $request->comment_id,
                'likeable_type' => Comment::class
            ])->first();

            if ($like) {
                $like->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Unlike successfully'
                ], 200);
            } else {
                $like = new Like;
                $like->likeable_id = $request->comment_id;
                $like->likeable_type = Comment::class;
                $like->user_id = auth()->user()->id;
                if ($like->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Create like successfully',
                        'user' => $like
                    ], 201);
                }
            }
        } else {
            $like = Like::where([
                'user_id' => auth()->user()->id,
                'likeable_id' => $request->reply_id,
                'likeable_type' => Reply::class
            ])->first();

            if ($like) {
                $like->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Unlike successfully'
                ], 200);
            } else {
                $like = new Like;
                $like->likeable_id = $request->reply_id;
                $like->likeable_type = Reply::class;
                $like->user_id = auth()->user()->id;
                if ($like->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Create like successfully',
                        'user' => $like
                    ], 201);
                }
            }
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function checkHasLike(Request $request)
    {
        $result = Like::where('user_id', $request->user_id)
            ->where('likeable_id', $request->likeable_id)
            ->where('likeable_type', $request->likeable_type)
            ->first();
        
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => true,
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => false,
            ], 200);
        }
    }
}
