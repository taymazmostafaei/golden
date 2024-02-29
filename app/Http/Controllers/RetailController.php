<?php

namespace App\Http\Controllers;

use App\Models\Retail;
use Illuminate\Http\Request;

class RetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manager.retail.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.retail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'retail_category_id' => 'required|exists:retail_categories,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'desc' => 'required|string',
            'hide' => 'boolean',
        ]);

        // Create a new Retail instance
        $retail = new Retail();

        // Fill the Retail instance with data from the request
        $retail->retail_category_id = $request->input('retail_category_id');
        $retail->name = $request->input('name');
        $retail->price = $request->input('price');
        $retail->desc = $request->input('desc');
        $retail->hide = $request->input('hide', false); // default to false if not provided

        // Save the Retail instance
        $retail->save();

        // Optionally, you can return a response indicating success
        return redirect()->back()->with('success', 'محصول مورد نظر با موفقیت ایجاد شد.');
        return response()->json(['message' => 'Retail created successfully', 'data' => $retail], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Retail $retail)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retail $retail)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Retail $retail)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Retail $retail)
    {
        dd('destroy');
    }
}
