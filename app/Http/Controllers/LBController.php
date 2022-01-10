<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leaderboard;
use App\Models\leaderboard2;
use App\Models\leaderboard3;

class LBController extends Controller
{

    function index() {
        return view('lb/index', ['title' => 'Leaderboard']);
    }

    function lb1 () {
        $result = leaderboard::orderBy('score', 'DESC')->get();
        return view('lb/lb1', ['title' => 'Leaderboard 1', 'lbs' => $result]);
    }

    function lb2 () {
        $result = leaderboard2::orderBy('score', 'DESC')->get();
        return view('lb/lb1', ['title' => 'Leaderboard 1', 'lbs' => $result]);
    }

    function lb3 () {
        $result = leaderboard3::orderBy('score', 'DESC')->get();
        return view('lb/lb1', ['title' => 'Leaderboard 1', 'lbs' => $result]);
    }
}
