<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/timeline', TimelineController::class)->middleware(['auth', 'verified'])->name('timeline');

Route::get('/post/{post}', [PostController::class, 'show'])->middleware(['auth', 'verified']);

Route::post('/post', [PostController::class, 'store'])->middleware('auth');

Route::post('/comment', [CommentController::class, 'store'])->middleware('auth');
// Route::post('/post', [PostController::class, 'store']);

require __DIR__.'/auth.php';
