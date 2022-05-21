<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    //
    public function createComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;
        $comment->video_id = $request->video_id;

        if ($comment->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Create comment successfully',
                'user' => $comment
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function getComments(Request $request)
    {
        $comments = Comment::where('video_id', $request->query('video_id'))->get();
        return response()->json([
            'status' => 'success',
            'comment' => $comments,
            'comments_count' => $comments->count()
        ], 200);
    }
}
