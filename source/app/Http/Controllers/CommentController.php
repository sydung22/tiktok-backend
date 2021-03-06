<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getComments']]);
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
            'comments' => $comments,
            'comments_count' => $comments->count()
        ], 200);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if (auth()->user() && auth()->user()->id === $comment->user_id) {
            $comment->delete();
            $comment->replies()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Delete comment successfully'
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
