<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getAllVideos', 'getVideoDetailById', 'getVideosByParams', 'storeVideoUrl']]);
    }

    //
    public function storeVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_url' => 'required',
            'video_cover_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $video = new Video();

        $video->url = $request->video_url;
        $video->cover = $request->video_cover_url;
        $video->user_id = auth()->user()->id;

        
        if (!empty($request->description)) {
            $video->description = $request->description;
        }
        
        $video->save();

        if (!empty($request->hashtags)) {
            $video->hashtags()->syncWithoutDetaching($request->hashtags);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Saved video successfully',
            'video' => $video,
        ], 200);
    }

    public function storeVideoUrl(Request $request)
    {
        $uploadedFileUrl = cloudinary()->uploadFile($request->file('video')->getRealPath())->getSecurePath();
        return response()->json([
            'status' => 'success',
            'message' => 'Uploaded video successfully',
            'video_url' => $uploadedFileUrl,
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

    public function getVideosByParams(Request $request)
    {
        $userId = $request->input('user_id');
        $hashtags = $request->input('hashtag');

        $videos = [];

        if ($userId) {
            $videos = Video::where('user_id', $userId)->get();
        }

        if ($hashtags) {
            $videos = Video::whereHas('hashtags', function ($query) use ($hashtags) {
                $query->whereIn('hashtags.id', $hashtags);
            })->get();
        }
       
        return response()->json([
            'status' => 'success',
            'videos' => $videos
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

    public function getVideosLiked()
    {
        $userId = auth()->user()->id;
        $videos = DB::table('likes')
            ->join('videos', 'likes.likeable_id', '=', 'videos.id')
            ->where('likes.likeable_type', 'App\Models\Video')
            ->where('likes.user_id', $userId)
            ->select('videos.*')
            ->get();
        return response()->json([
            'status' => 'success',
            'videos' => $videos
        ], 200);
    }

    public function getAllVideos()
    {
        $videos = Video::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Get videos successfully',
            'videos' => $videos,
        ], 200);
    }

    public function deleteVideo($id)
    {
    }
}
