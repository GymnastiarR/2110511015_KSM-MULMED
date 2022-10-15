<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TimelineController extends Controller
{
    public function __invoke()
    {
        return \view('timeline', [
            'posts' => Post::with('comments.user')->latest()->get(),
        ]);
    }
}
