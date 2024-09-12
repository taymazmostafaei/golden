<?php

namespace App\Http\Controllers;

use App\Models\Retail;
use App\Models\RetailCategory;
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

    public function list()
    {
        $retails = Retail::all();
        return response()->json(
            [
                "data" => $retails
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = RetailCategory::all();
        return view('manager.retail.create', ['cats' => $cats]);
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
            //'price' => 'required|numeric',
            'desc' => 'required|string',
            'hide' => 'sometimes',
            'type_bangle' => 'sometimes'
        ]);

        // Create a new Retail instance
        $retail = new Retail();

        // Fill the Retail instance with data from the request
        $retail->retail_category_id = $request->input('retail_category_id');
        $retail->name = $request->input('name');
        $retail->price = 1;
        $retail->desc = $request->input('desc');
        $retail->hide = $request->has('hide');
        $retail->moreoptions = ['type_bangle' => $request->has('type_bangle')];

        // Save the Retail instance
        $retail->save();

        // Optionally, you can return a response indicating success
        return redirect()->route('retail.index')->with('success', 'محصول مورد نظر با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Retail $retail)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retail $retail)
    {
        $cats = RetailCategory::all();
        return view('manager.retail.edit', ['retail' => $retail, 'cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Retail $retail)
    {
        // Validate incoming request
        $request->validate([
            'retail_category_id' => 'required|exists:retail_categories,id',
            'name' => 'required|string',
            //'price' => 'required|numeric',
            'desc' => 'required|string',
            'hide' => 'sometimes',
        ]);

        // Update the attributes with data from the request
        $retail->retail_category_id = $request->input('retail_category_id');
        $retail->name = $request->input('name');
        $retail->price = 1;
        $retail->desc = $request->input('desc');
        $retail->hide = $request->has('hide');

        // Save the changes
        $retail->save();

        // Optionally, you can return a response indicating success
        return redirect()->back()->with('success', 'محصول مورد نظر با موفقیت به‌روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Retail $retail)
    {
        $retail->delete();

        return redirect()->back()->with('success', 'محصول با موفقیت حذف شد.');
    }
}
