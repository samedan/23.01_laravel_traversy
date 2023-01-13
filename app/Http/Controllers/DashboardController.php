<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        // construct uses the middleware for all the controller
        $this->middleware(['auth']);
    }
    public function index() {
        
        return view('dashboard');
    } 
}
