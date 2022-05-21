<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Video;

class SearchController extends Controller
{
    //
    public function searchByKeyword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $users = User::where('username', 'like', '%' . $request->keyword . '%')->get();
        $videos = Video::where('description', 'like', '%' . $request->keyword . '%')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Create like successfully',
            'result' => [
                'users' => $users,
                'videos' => $videos,
            ]
        ], 201);
    }
}
