<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
