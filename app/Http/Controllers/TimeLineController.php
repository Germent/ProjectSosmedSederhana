<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class TimeLineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       return view('dashboard', [
        'posts' => Post::with('user')->withCount('comments')->latest('id')->get(),
       ]);
    }
}
