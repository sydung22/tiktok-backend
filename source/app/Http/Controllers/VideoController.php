<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Follow;
use App\Models\Hashtag;
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

        if (!empty($request->type)) {
            $video->type = $request->type;
        }
        
        if (!empty($request->description)) {
            $video->description = $request->description;
        }
        
        $video->save();

        if (!empty($request->hashtags)) {
            $hashtagIds = [];
            foreach ($request->hashtags as $field => $value) {
                $hashtag = Hashtag::where('name', $value)->first();
                if ($hashtag) {
                    $hashtagIds[] = $hashtag->id;
                } else {
                    $hashtag = new Hashtag();
                    $hashtag->name = $value;
                    $hashtag->save();
                    $hashtagIds[] = $hashtag->id;
                }
            }
            $video->hashtags()->syncWithoutDetaching($hashtagIds);
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
        $type = $request->input('type');

        $videos = [];

        if ($userId) {
            $videos = Video::where('user_id', $userId)->get();
        }

        if ($hashtags) {
            $videos = Video::whereHas('hashtags', function ($query) use ($hashtags) {
                $query->whereIn('hashtags.id', $hashtags);
            })->get();
        }

        if ($type) {
            $videos = Video::where('type', $type)->orderBy('createdAt', 'desc')->get();
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
        $video = Video::find($id);
        if (auth()->user()) {
            if (auth()->user()->role === 1 && auth()->user()->id !== $video->user_id) {
                $video->delete();
                DB::select("CALL handle_video_report_delete_action('REPORT', ?)", [$video->user_id]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Deleted video successfully',
                ], 200);
            } elseif (auth()->user()->id == $video->user_id) {
                $video->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Deleted video successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'You are not authorized to delete this video'
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'You are not authorized to delete this video',
            ], 400);
        }
    }

    public function editVideo($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_url' => 'string',
            'video_cover_url' => 'string',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $video = Video::find($id);

        if (auth()->user() && auth()->user()->id === $video->user_id) {
            if (!empty($request->video_url)) {
                $video->url = $request->video_url;
            }
            
            if (!empty($request->video_cover_url)) {
                $video->cover = $request->video_cover_url;
            }
    
            if (!empty($request->description)) {
                $video->description = $request->description;
            }

            if (!empty($request->type)) {
                $video->type = $request->type;
            }

            if ($request->type === 'SHARE' && !empty($request->share_description)) {
                $video->share_description = $request->share_description;
            }
    
            if (!empty($request->hashtags)) {
                $hashtagIds = [];
                foreach ($request->hashtags as $field => $value) {
                    $hashtag = Hashtag::where('name', $value)->first();
                    if ($hashtag) {
                        $hashtagIds[] = $hashtag->id;
                    } else {
                        $hashtag = new Hashtag();
                        $hashtag->name = $value;
                        $hashtag->save();
                        $hashtagIds[] = $hashtag->id;
                    }
                }
                $video->hashtags()->sync($hashtagIds);
            }
    
            if ($video->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Update video successfully',
                    'video' => $video
                ], 201);
            }
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function shareVideo($id, Request $request)
    {
        $video = Video::find($id);

        if (auth()->user()) {
            $videoShare = new Video;
            $videoShare->url = $video->url;
            $videoShare->cover = $video->cover;
            $videoShare->description = $video->description;
            $videoShare->user_id = $video->user_id;
            
            $videoShareHashtagIds = [];

            foreach ($video->hashtags as $field => $value) {
                $videoShareHashtagIds[] = $value->id;
            }

            $videoShare->share_description = $request->share_description;
            $videoShare->type = 'SHARE';
            $videoShare->share_user_id = auth()->user()->id;
            $videoShare->save();
            $videoShare->hashtags()->sync($videoShareHashtagIds);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Share video successfully',
                'video' => $videoShare
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
