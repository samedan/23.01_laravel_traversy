<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct() {
        // construct uses the middleware for all the controller
        $this->middleware(['auth']);
    }
    public function index() {
        // dd(Post::find(4)->created_at);
    
        return view('dashboard');
    } 
}
