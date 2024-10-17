<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->get(); // Get all galleries with category
        return view('gallery.index', compact('galleries'));
    }


    // Show galleries by category
    public function indexByCategory(Category $category)
    {
        $galleries = $category->galleries; // Assuming there is a relationship defined in the Category model
        return view('user.galleries.index', compact('category', 'galleries'));
    }

    public function create()
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }

    public function show($id)
    {
        $gallery = Gallery::with('category')->findOrFail($id);
        return view('gallery.show', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Category::all();
        return view('gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($gallery->image_path);
            $imagePath = $request->file('image')->store('images', 'public');
            $gallery->image_path = $imagePath;
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->category_id = $request->category_id;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
