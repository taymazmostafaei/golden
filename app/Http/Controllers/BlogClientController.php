<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(30);

        return view('blog', ['blogs' => $blogs, 'pageConfigs' => ['myLayout' => 'front']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blogs = Blog::latest()->take(3)->get();

        return view('blogSingle', ['blog' => $blog, 'blogs' => $blogs, 'pageConfigs' => ['myLayout' => 'front']]);
    }
}
