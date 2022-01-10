<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materi1;
use App\Models\materi2;
use App\Models\materi3;
use App\Models\User;
use App\Models\leaderboard;
use App\Models\leaderboard2;
use App\Models\leaderboard3;

class QuizController extends Controller
{
    function index() {
        return view('quiz/index', ['title' => 'QUIZ | MATERI']);
    }

    function post1(User $user) {
        $score = 0;
        $result = materi1::orderBy('no', 'ASC')->get();
        foreach($result as $r) {
            if(!empty(Request()->input('no' . $r->no)[$r->no])){
                if($r->benar == Request()->input('no' . $r->no)[$r->no]) {
                    $score += 20;
                }
            }
        }

        $data['username'] = $user->username;
        $data['score'] = $score;

        $rescore = leaderboard::where('username', auth()->user()->username)->get();

        if(!$rescore->isEmpty()) {
            leaderboard::where('username', auth()->user()->username)->update($data);
        }else {
            leaderboard::create($data);
        }

        return view('/quiz/score', ['title' => 'Your Score', 'user' => $user, 'score' => $score]);

    }

    function post2(User $user) {
        $score = 0;
        $result = materi2::orderBy('no', 'ASC')->get();
        foreach($result as $r) {
            if(!empty(Request()->input('no' . $r->no)[$r->no])){
                if($r->benar == Request()->input('no' . $r->no)[$r->no]) {
                    $score += 20;
                }
            }
        }

        $data['username'] = $user->username;
        $data['score'] = $score;

        $rescore = leaderboard2::where('username', auth()->user()->username)->get();

        if(!$rescore->isEmpty()) {
            leaderboard2::where('username', auth()->user()->username)->update($data);
        }else {
            leaderboard2::create($data);
        }

        return view('/quiz/score', ['title' => 'Your Score', 'user' => $user, 'score' => $score]);

    }

    function post3(User $user) {
        $score = 0;
        $result = materi3::orderBy('no', 'ASC')->get();
        foreach($result as $r) {
            if(!empty(Request()->input('no' . $r->no)[$r->no])){
                if($r->benar == Request()->input('no' . $r->no)[$r->no]) {
                    $score += 20;
                }
            }
        }

        $data['username'] = $user->username;
        $data['score'] = $score;

        $rescore = leaderboard3::where('username', auth()->user()->username)->get();

        if(!$rescore->isEmpty()) {
            leaderboard3::where('username', auth()->user()->username)->update($data);
        }else {
            leaderboard3::create($data);
        }

        return view('/quiz/score', ['title' => 'Your Score', 'user' => $user, 'score' => $score]);

    }
}
