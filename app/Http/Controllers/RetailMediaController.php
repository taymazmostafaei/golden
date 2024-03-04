<?php

namespace App\Http\Controllers;

use App\Models\Retail;
use App\Models\RetailMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetailMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $validate = Validator::make($request->all(), [
            "file" => 'required|image|mimes:jpeg,jpg|max:1000',
        ]);

        if ($validate->fails() and !$request['file']->isValid()) {

            return response()->json(["errore" => $validate->errors()], 301);
        }

        $picture = $request['file'];

        $path = $picture->store('public/retail-media');

        $media = new RetailMedia([
            'retail_id' => $request->retail_id,
            'path' => basename($path)
        ]);

        $media->save();
        return response()->json(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(RetailMedia $retailMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RetailMedia $retailMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RetailMedia $retailMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetailMedia $retailMedia)
    {
        $retailMedia->delete();
        return redirect()->back()->with('success', 'تصویر با موفقیت حذف شد.');
    }
}
