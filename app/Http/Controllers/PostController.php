<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get(); // all !! posts = Collection
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    public function store(Request $request) {
        $this->validate($request, [
            'body'=> 'required'
        ]);

        // $request->user()->posts()->create(['body'=> $request->body]);
        $request->user()->posts()->create($request->only('body'));
        return back();
    }
}
