<?php

namespace App\Http\Controllers;

use App\Models\Melted;
use Illuminate\Http\Request;

class MeltedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.melted');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexJson()
    {
        $melteds = Melted::where('user_id', auth()->user()->id)->get();
        return response()->json(
            [
                "data" => $melteds
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
    public function show(Melted $melted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Melted $melted)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Melted $melted)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Melted $melted)
    {
        //
    }
}
