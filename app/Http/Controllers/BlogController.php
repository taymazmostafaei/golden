<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(30);

        return view('manager.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title' => 'required|string',
            'desc' => 'required|string',
            'text' => 'required|string',
            'hide' => 'sometimes',
        ]);

        // Create a new blog instance
        $blog = new Blog();

        // Fill the blog instance with data from the request
        $blog->title = $request->input('title');
        $blog->desc = $request->input('desc');
        $blog->text = $request->input('text');
        $blog->hide = $request->has('hide');

        // Save the blog instance
        $blog->save();

        // Optionally, you can return a response indicating success
        return redirect()->route('blog.index')->with('success', 'با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('manager.blog.edit', ['blog' => $blog]);
    }

    public function mediaUpload(Request $request, Blog $blog)
    {
        $validate = Validator::make($request->all(), [
            "file" => 'required|image|mimes:jpeg,jpg|max:1000',
        ]);

        if ($validate->fails() and !$request['file']->isValid()) {

            return response()->json(["errore" => $validate->errors()], 301);
        }

        $picture = $request['file'];

        $path = $picture->store('public/blog');

        $blog->media_path = basename($path);
        $blog->save();

        return response()->json(['success' => 'success']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        dd($request->all());
        // Validate incoming request
        $request->validate([
            'title' => 'required|string',
            'desc' => 'required|string',
            'text' => 'required|string',
            'hide' => 'sometimes',
        ]);

        // Fill the blog instance with data from the request
        $blog->title = $request->input('title');
        $blog->desc = $request->input('desc');
        $blog->text = $request->input('text');
        $blog->hide = $request->has('hide');

        // Save the blog instance
        $blog->save();

        // Optionally, you can return a response indicating success
        return redirect()->route('blog.index')->with('success', 'با موفقیت بروز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->back()->with('success', 'با موفقیت حذف شد.');
    }
}
