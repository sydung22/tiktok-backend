<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;

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
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'errors' => $validator->errors()], 400);
        }

        $report = new Report();
        $report->description = $request->description;
        $report->user_id = auth()->user()->id;
        $report->video_id = $request->video_id;

        if ($report->save()) {
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
