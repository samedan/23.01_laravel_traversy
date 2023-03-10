<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index () {
        // Eager Loading
        // get the likes one with the posts on 1 request
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5); // Collection

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    // Delete post
    public function destroy(Post $post) {
        $this->authorize('deletePost', $post); // 'deletePost' comes from PostPolicy
        $post->delete();
        return back();
    }
}
