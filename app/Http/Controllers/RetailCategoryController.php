<?php

namespace App\Http\Controllers;

use App\Models\RetailCategory;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class RetailCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = RetailCategory::isRoot()->get();
        return view('user.retails.category', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexManager()
    {
        $categories = RetailCategory::isRoot()->get();
        return view('manager.retail.category.index', ['categories' => $categories, 'parent' => null]);
    }

    /**
     * Display a listing of the resource.
     */
    // public function indexJson()
    // {
    //     $categories = RetailCategory::all();
    //     return response()->json(
    //         [
    //             "data" => $categories
    //         ]
    //     );
    // }

    public function formatedIndex()
    {
        $categories = RetailCategory::all();

        // Format the categories into the desired structure
        $formattedCategories = [];
        foreach ($categories as $key => $category) {
            $formattedCategories[$category->id] = ['name' => $category->name];
        }

        // Return the formatted categories
        return response()->json($formattedCategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RetailCategory $retailCategory)
    {
        $cartcount = CartFacade::session(auth()->user()->id)->getTotalQuantity();
        return view('user.retails.list', ['category' => $retailCategory, 'cartcount' => $cartcount]);
    }

        /**
     * Display the specified resource.
     */
    public function showManager(RetailCategory $retailCategory)
    {
        return view('manager.retail.category.index', ['categories' => $retailCategory->children, 'parent' => $retailCategory->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RetailCategory $retailCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RetailCategory $retailCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetailCategory $retailCategory)
    {
        $retailCategory->delete();
        return redirect()->back()->with('success', 'دسته بندی با موفقیت حذف شد.');
    }
}
