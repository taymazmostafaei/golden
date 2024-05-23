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
        $setting = Setting::where('type', 'setting')->get();
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
        $allSettings = Setting::where('type', 'setting')->get();

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


    public function storeSetup(Request $request)
    {

        // Retrieve all the settings from the request except the CSRF token
        $inputs = $request->except('_token');
        foreach ($inputs as $key => $value) {
            
            Setting::where('type', 'setup')
                ->where('key', $key)
                ->update(['value' => $value]);
        }

        return redirect()->back()->with('success', 'با موفقیت بروز رسانی شد.');
    }

    public function setup()
    {
        $setups = Setting::where('type', 'setup')->get();

        return view('manager.setting.setup', ['setups' => $setups]);
    }
}
