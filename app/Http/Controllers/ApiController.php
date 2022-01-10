<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\materi1;
use App\Models\materi2;
use App\Models\materi3;
use App\Models\leaderboard;
use App\Models\leaderboard2;
use App\Models\leaderboard3;

class ApiController extends Controller
{
    function user() {
        $response['status'] = 200;
        $response['data'] = User::all();
        return response()->json($response, 200);
    }

    function materi1() {
        $response['status'] = 200;
        $response['data'] = materi1::all();
        return response()->json($response, 200);
    }   

    function materi2() {
        $response['status'] = 200;
        $response['data'] = materi2::all();
        return response()->json($response, 200);
    }   

    function materi3() {
        $response['status'] = 200;
        $response['data'] = materi3::all();
        return response()->json($response, 200);
    }   

    function leaderboard1() {
        $response['status'] = 200;
        $response['data'] = leaderboard::all();
        return response()->json($response, 200);
    }   

    function leaderboard2() {
        $response['status'] = 200;
        $response['data'] = leaderboard2::all();
        return response()->json($response, 200);
    }   

    function leaderboard3() {
        $response['status'] = 200;
        $response['data'] = leaderboard3::all();
        return response()->json($response, 200);
    }   
}
