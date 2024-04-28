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
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->all();

        $validator = Validator::make($data, [
            'firstname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'lastname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'national_id' => ['required', 'ir_national_code'],
            'status' => ['required', 'string', 'in:verify,wait,reject'],
            'telphone' => ['required', 'ir_phone_with_code'],
            'address' => ['required', 'persian_alpha_eng_num', 'string', 'max:64'],
            // You might want to add validation rules for other fields if they are updated too
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the user with validated data
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->national_id = $data['national_id'];
        $user->status = $data['status'];
        $user->telphone = $data['telphone'];
        $user->address = $data['address'];
        $user->status = 'wait';
        $user->save();

        // Redirect to a route or return a response
        return redirect()->back()->with('success', 'کاربر با موفقیت بروز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
