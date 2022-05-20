<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_id' => 'required_without_all:comment_id',
            'comment_id' => 'required_without_all:video_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }
    }
}
