<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\RetailMedia;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $slides = RetailMedia::latest()->take(7)->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('index', ['pageConfigs' => ['myLayout' => 'front'], 'slides' => $slides, 'blogs' => $blogs]);
    }
}
