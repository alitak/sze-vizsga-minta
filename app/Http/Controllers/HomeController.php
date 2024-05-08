<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function __invoke()
    {
        return view('home', [
            'posts' => Post::query()->with(['user'])->latest()->paginate(10),
        ]);
    }
}
