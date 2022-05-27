<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('healthy', function () {
    return response()->json(['status' => 'ok']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'getUsers']);
    Route::get('{id}', [UserController::class, 'getUserDetailById']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'video'
], function () {
    Route::post('/store-url', [VideoController::class, 'storeVideoUrl']);
    Route::post('/save-video', [VideoController::class, 'storeVideo']);
    Route::get('/me', [VideoController::class, 'getVideosOfMe']);
    Route::get('/', [VideoController::class, 'getAllVideos']);
    Route::get('/params', [VideoController::class, 'getVideosByParams']);
    Route::get('/liked', [VideoController::class, 'getVideosLiked']);
    Route::get('{id}', [VideoController::class, 'getVideoDetailById']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'comment'
], function () {
    Route::post('/', [CommentController::class, 'createComment']);
    Route::get('/', [CommentController::class, 'getComments']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'reply'
], function () {
    Route::post('/', [ReplyController::class, 'createReplyComment']);
    Route::get('/', [ReplyController::class, 'getRepliesComment']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'like'
], function () {
    Route::post('/', [LikeController::class, 'like']);
    Route::post('/checked', [LikeController::class, 'checkHasLike']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'follow'
], function () {
    Route::post('/', [FollowController::class, 'follow']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'report'
], function () {
    Route::post('/', [ReportController::class, 'reportVideo']);
    Route::get('/', [ReportController::class, 'getReports']);
});

Route::prefix('hashtag')->group(function () {
    Route::get('/', [HashtagController::class, 'getHashtags']);
    Route::post('/', [HashtagController::class, 'createHashtag']);
    Route::delete('{id}', [HashtagController::class, 'deleteHashtag']);
});

Route::prefix('search')->group(function () {
    Route::get('/', [SearchController::class, 'searchByKeyword']);
});

Route::prefix('admin')->group(function () {
});
