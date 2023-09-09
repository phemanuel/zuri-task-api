<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class ApiController extends Controller
{
    //
    public function zuriTask(Request $request)
    {
        // Validate query parameters
        $request->validate([
            'slack_name' => 'required',
            'track' => 'required',
        ]);

        // Get required parameters
        $slackName = $request->input('slack_name');
        $track = $request->input('track');
        
        // Validate the track
        // if (!in_array($track, ['Backend', 'Frontend'])) {
        //     return response()->json(['error' => 'Invalid track'], 400);
        // }

        // Get current day of the week
        $currentDayOfWeek = Carbon::now()->format('l');

        // Get current UTC time
        $currentUTCTime = Carbon::now('UTC')->toDateTimeString();

        // Get the GitHub URL of the file being run
        $githubFileURL = URL::to('/') . '/' . __FILE__;        

        // Get the GitHub URL of the full source code
        $githubSourceURL = 'https://github.com/phemanuel/zuri-task-api';

        // Return the information in JSON format
        $data = [
            'slack_name' => $slackName,
            'current_day_of_week' => $currentDayOfWeek,
            'current_utc_time' => $currentUTCTime,
            'track' => $track,
            'github_file_url' => $githubFileURL,
            'github_source_url' => $githubSourceURL,
            'status' => 200,
        ];

        return response()->json($data);
    }
}
