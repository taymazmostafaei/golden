<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::all();
        return view('manager.setting.possibilities', ['settings' => $setting]);
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
        // Retrieve all settings from the database
        $allSettings = Setting::all();

        // Retrieve all the settings from the request except the CSRF token
        $input = $request->except('_token');

        // Loop through each setting from the database
        foreach ($allSettings as $setting) {
            if (isset($input[$setting->key])) {
                // If the setting is in the input, update its value
                $setting->value = ($input[$setting->key] === 'on') ? 1 : 0;
            } else {
                // If the setting is not in the input, set its value to 0
                $setting->value = 0;
            }
            $setting->save();
        }
        return redirect()->back()->with('success', 'با موفقیت بروز رسانی شد.');

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
