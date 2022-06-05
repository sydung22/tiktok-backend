<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Hashtag;

class HashtagController extends Controller
{
    //
    public function createHashtag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $hashtag = new Hashtag();
        $hashtag->name = $request->name;

        if (!empty($request->description)) {
            $hashtag->description = $request->description;
        }

        if ($hashtag->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Create hashtag successfully',
                'user' => $hashtag
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function getHashtags()
    {
        $hashtags = Hashtag::all();
        return response()->json([
            'status' => 'success',
            'hashtag' => $hashtags
        ], 200);
    }

    public function deleteHashtag($id)
    {
        if (auth()->user() && auth()->user()->role === 1) {
            $hashtag = Hashtag::find($id);
            if ($hashtag->delete() && $hashtag->videos()->detach()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Delete hashtag successfully'
                ], 200);
            }
        }
        
        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
