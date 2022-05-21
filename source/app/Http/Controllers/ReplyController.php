<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getRepliesComment']]);
    }
    //
    public function createReplyComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'comment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = auth()->user()->id;
        $reply->comment_id = $request->comment_id;

        if ($reply->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Create reply comment successfully',
                'user' => $reply
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function getRepliesComment(Request $request)
    {
        $replies = Reply::where('comment_id', $request->query('comment_id'))->get();
        return response()->json([
            'status' => 'success',
            'replies' => $replies,
            'replies_count' => $replies->count()
        ], 200);
    }
}
