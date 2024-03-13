<?php

namespace App\Http\Controllers;

use App\Models\RetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Query posts for the authenticated user
        $orders = RetailOrder::where('user_id', $userId)->latest()->paginate(10);
    
        return view('user.retails.orders', ['orders' => $orders]);
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
    public function show(RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetailOrder $retailOrder)
    {
        //
    }
}
