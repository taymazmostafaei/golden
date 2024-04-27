<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Myprofile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.myProfile', ['user' => $user]);
    }

    /**
     * Cert Image Update.
     */
    public function certUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validate = Validator::make($request->all(), [
            "file" => 'required|image|mimes:jpeg,jpg|max:1000',
        ]);

        if ($validate->fails() and !$request['file']->isValid()) {

            return response()->json(["errore" => $validate->errors()], 301);
        }

        $picture = $request['file'];

        $path = $picture->store('public/certs');

        $user->status = 'wait';
        $user->cert = basename($path);
        $user->save();

        return response()->json(['success' => 'success']);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
