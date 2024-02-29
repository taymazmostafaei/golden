<?php

namespace App\Http\Controllers;

use App\Models\RetailCategory;
use Illuminate\Http\Request;

class RetailCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = RetailCategory::all();
        return response()->json(
            [
                "data" => $categories
            ]
        );
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
        //
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
        //
    }
}
