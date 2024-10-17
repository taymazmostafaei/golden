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
        $blogs = Blog::where('isbrand', false)->latest()->paginate(30);

        return view('blog', ['blogs' => $blogs, 'pageConfigs' => ['myLayout' => 'front']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blogs = Blog::where('isbrand', false)->latest()->take(3)->get();

        return view('blogSingle', ['blog' => $blog, 'blogs' => $blogs, 'pageConfigs' => ['myLayout' => 'front']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function brands()
    {
        $blogs = Blog::where('isbrand', true)->latest()->paginate(30);

        return view('user.brands.index', ['blogs' => $blogs]);
    }

    public function brandSingle(Blog $blog)
    {
        $blogs = Blog::where('isbrand', true)->latest()->take(3)->get();

        return view('user.brands.show', ['blog' => $blog, 'blogs' => $blogs]);
    }
}
