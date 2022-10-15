<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __invoke()
    // {
    //     return \view('dashboard', [
    //         'posts' => Post::latest()->get()
    //     ]);
    // }

    public function index()
    {
        return \view('dashboard', [
            'posts' => Post::with(['comments' => function($query){
                $query->latest()->limit(3);
            }, 'comments.user'])->where('id', Auth::id())->latest()->get()
        ]);
    }
}
