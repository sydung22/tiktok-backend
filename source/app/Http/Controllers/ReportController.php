<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;
use App\Models\User;
use App\Models\Video;
use App\Mail\ReportMail;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function reportVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_id' => 'required',
            'description' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $report = new Report();
        $report->description = $request->description;
        $report->title = $request->title;
        $report->user_id = auth()->user()->id;
        $report->video_id = $request->video_id;

        $user = User::find(auth()->user()->id)->first();
        $admin = User::where('role', 1)->first();

        if ($report->save()) {
            Mail::to($admin->email)->send(new ReportMail($request->title, $request->description, $request->video_id, $user->email));

            return response()->json([
                'status' => 'success',
                'message' => 'Create report successfully',
                'user' => $report
            ], 201);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }

    public function getReports()
    {
        if (auth()->user()->role == 1) {
            $reports = Report::all();
            return response()->json([
                'status' => 'success',
                'reports' => $reports
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Service Error'
        ], 400);
    }
}
