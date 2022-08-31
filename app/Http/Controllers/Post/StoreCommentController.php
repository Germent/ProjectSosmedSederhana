<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $post)
    {

        // $data = $request->validate([
        //     'body' => ['required', 'min:8']
        // ]);

        // $data['user_id'] = $request->user()->id;

        // $comment = $post->comments()->create($data);

        $comms = new Comment;
        $comms->user_id=Auth::user()->id;
        $comms->post_id = $post;
        $comms->body = $request->body;
        $comms->save();


        $dt = [
            'id' => $comms->id,
            'name' => Auth::user()->name,
            'post_id' => $comms->post_id,
            'body' => $comms->body

        ];
        return response()->json($dt, 200);
        // return redirect()->back()->with('success', 'Comment Added');
    }
}
