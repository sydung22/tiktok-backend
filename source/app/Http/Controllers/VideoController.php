<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getVideos', 'getVideosOfUser', 'getVideoDetailById']]);
    }

    //
    public function storeVideo(Request $request)
    {
        $video = new Video();
        $uploadedVideoUrl = cloudinary()->uploadFile($request->file('video')->getRealPath())->getSecurePath();
        $uploadedCoverUrl = cloudinary()->uploadFile($request->file('cover')->getRealPath())->getSecurePath();

        $video->url = $uploadedVideoUrl;
        $video->cover = $uploadedCoverUrl;
        if (!empty($request->description)) {
            $video->description = $request->description;
        }
        
        $video->user_id = auth()->user()->id;

        $video->save();

        if (!empty($request->hashtags)) {
            $video->hashtags()->syncWithoutDetaching($request->hashtags);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Uploaded video successfully',
            'video' => $video,
        ], 200);
    }

    public function getVideosOfMe(Request $request)
    {
        $userId = auth()->user()->id;

        $isFollowing = $request->input('is_following');
        $followings = Follow::where(['user_id_1' => $userId])->pluck('user_id_2');

        if ($isFollowing == null) {
            $videos = Video::where('user_id', $userId)->get();
            return response()->json([
                'status' => 'success',
                'video' => $videos
            ], 200);
        }

        if ($isFollowing) {
            $videos = Video::whereIn('user_id', $followings)->orderBy('created_at', 'desc')->get();
            return response()->json([
                'status' => 'success',
                'video' => $videos
            ], 200);
        } else {
            $videos = Video::whereNotIn('user_id', $followings)->orderBy('created_at', 'desc')->get();
            return response()->json([
                'status' => 'success',
                'video' => $videos
            ], 200);
        }
    }

    public function getVideosOfUser($id)
    {
        $videos = Video::where('user_id', $id)->get();

        return response()->json([
            'status' => 'success',
            'video' => $videos
        ], 200);
    }

    public function getVideoDetailById($id)
    {
        $video = Video::find($id);
        $video->views++;
        $video->save();
        return response()->json([
            'status' => 'success',
            'video' => $video
        ], 200);
    }
}
