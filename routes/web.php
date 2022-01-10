<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\postController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\M1Controller;
use App\Http\Controllers\M2Controller;
use App\Http\Controllers\M3Controller;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LBController;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\Stock;
use App\Models\Plant;
use App\Models\Item;
use App\Models\materi1;
use App\Models\materi2;
use App\Models\materi3;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home', ['title' => 'Home | Quiz']);
});

// Auth Route
Route::get('/signin', [authController::class, 'signin'])->name('login')->middleware('guest');
Route::get('/signup', [authController::class, 'signup'])->middleware('guest');
Route::post('/signup', [authController::class, 'store'])->middleware('guest');
Route::post('/signin', [authController::class, 'auth'])->middleware('guest');
Route::post('/logout', [authController::class, 'logout'])->middleware('auth');

// m1 Route
Route::get('/m1', [M1Controller::class, 'index']);
Route::post('m1', [M1Controller::class, 'store']);
Route::delete('/m1', [M1Controller::class, 'delete']);
Route::put('/m1', [M1Controller::class, 'update']);

// m2 Route
Route::get('/m2', [M2Controller::class, 'index']);
Route::post('m2', [M2Controller::class, 'store']);
Route::delete('/m2', [M2Controller::class, 'delete']);
Route::put('/m2', [M2Controller::class, 'update']);

// m3 Route
Route::get('/m3', [M3Controller::class, 'index']);
Route::post('m3', [M3Controller::class, 'store']);
Route::delete('/m3', [M3Controller::class, 'delete']);
Route::put('/m3', [M3Controller::class, 'update']);

// quiz route
Route::get('/quiz', [QuizController::class, 'index']);
Route::post('/quiz1/{user}', [QuizController::class, 'post1']);
Route::post('/quiz2/{user}', [QuizController::class, 'post2']);
Route::post('/quiz3/{user}', [QuizController::class, 'post3']);

// materi1 Route
Route::get('/materi1', function() {
    $materis = materi1::all();
    return view('materi.quiz', ['title' => 'Quiz | Materi 1', 'materis' => $materis]);
});

// materi2 Route
Route::get('/materi2', function() {
    $materis = materi2::all();
    return view('materi2.quiz', ['title' => 'Quiz | Materi 2', 'materis' => $materis]);

});

// materi3 Route
Route::get('/materi3', function() {
    $materis = materi3::all();
    return view('materi3.quiz', ['title' => 'Quiz | Materi 3', 'materis' => $materis]);
});

// Dashboard Route
Route::get('/dashboard', function() {
    return view('dashboard.index', [
        // 'title' => 'Dashboard',
        // 'stok' => Stock::all()->count(),
        // 'plant' => Plant::all()->count(),
        // 'item' => Item::all()->count()
    ]);
})->middleware('auth');
Route::get('/dashboard/posts/createSlug', [DashboardController::class, 'createSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardController::class)->middleware('auth');

// Admin Route
Route::resource('/dashboard/admin', AdminController::class)->middleware('admin');

// User Route
Route::get('/dashboard/user', [UserController::class, 'index'])->middleware('auth');
Route::put('/dashboard/user/{user}/password', [UserController::class, 'updatePassword'])->middleware('auth');
Route::put('/dashboard/user/{user}/number', [UserController::class, 'updateNumber'])->middleware('auth');
Route::put('dashboard/user/{user}/foto', [UserController::class, 'updateFoto'])->middleware('auth');
Route::put('dashboard/user/{user}/name', [UserController::class, 'updateName'])->middleware('auth');

// lb Route
Route::get('/lb', [LBController::class, 'index']);
Route::get('/lb1', [LBController::class, 'lb1']);
Route::get('/lb2', [LBController::class, 'lb2']);
Route::get('/lb3', [LBController::class, 'lb3']);

// Api
Route::get('/api/user', [ApiController::class, 'user']); 
Route::get('/api/materi1', [ApiController::class, 'materi1']); 
Route::get('/api/materi2', [ApiController::class, 'materi2']); 
Route::get('/api/materi3', [ApiController::class, 'materi3']); 
Route::get('/api/leaderboard1', [ApiController::class, 'leaderboard1']); 
Route::get('/api/leaderboard2', [ApiController::class, 'leaderboard2']); 
Route::get('/api/leaderboard3', [ApiController::class, 'leaderboard3']); 