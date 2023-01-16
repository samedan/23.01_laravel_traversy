<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request) {
        // check for an already liked post
        if($post->likedBy($request->user())) {
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id'=> $request->user()->id
        ]);

        // Send Email
        Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        

        // dd($post);
        return back();
    }

    // Unlike
    public function destroy(Post $post, Request $request) {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
