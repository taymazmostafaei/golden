<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexJson()
    {
        $users = User::all();
        return response()->json(
            [
                "data" => $users
            ]
        );
    }

    public function accessUpdate(Request $request, User $user)
    {
        $rules = [
            'users' => ['sometimes'],
            'orders' => ['sometimes'],
            'retails' => ['sometimes'],
            'news' => ['sometimes'],
            'setting' => ['sometimes'],
            'admin_dashboard' => ['sometimes'],
        ];

        // Validate the incoming request
        $validatedData = $request->validate($rules);

        // Convert "on" strings to boolean true
        foreach ($validatedData as $key => $value) {
            $validatedData[$key] = $value === 'on' ? 1 : $value;
        }

        // If any checkbox is not present in the request, consider it as false
        foreach (array_keys($rules) as $key) {
            if (!array_key_exists($key, $validatedData)) {
                $validatedData[$key] = 0;
            }
        }

        // Update the user's access permissions
        $user->update([
            'access' => $validatedData,
        ]);

        // Redirect to a route or return a response
        return redirect()->back()->with('success', 'کاربر با موفقیت بروز رسانی شد.');
    }

    public function index()
    {
        $counts = [
            "user" => User::count(),
            "verify" => User::where('status', 'verify')->count(),
            "wait" => User::where('status', 'wait')->count(),
            "reject" => User::where('status', 'reject')->count()
        ];

        return view('manager.user.list', ['counts' => (object) $counts]);
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
    public function edit(User $user)
    {
        return view('manager.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'firstname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'lastname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'national_id' => ['required', 'ir_national_code'],
            'status' => ['required', 'string', 'in:verify,wait,reject'],
            'phone' => ['required', 'ir_mobile:zero'],
            'telphone' => ['required', 'ir_phone_with_code'],
            'address' => ['required', 'persian_alpha_eng_num', 'string', 'max:64'],
            'trade_limit' => ['required', 'integer'],
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
        $user->phone = $data['phone'];
        $user->telphone = $data['telphone'];
        $user->address = $data['address'];
        $user->trade_limit = $data['trade_limit'];
        $user->save();

        // Redirect to a route or return a response
        return redirect()->back()->with('success', 'کاربر با موفقیت بروز رسانی شد.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function changeStatus(User $user, string $status)
    {
        $user->status = $status;
        $user->save();
        if ($status == 'verify') {
            (new SmsService())->RequestSMS(232753, $user->phone, [ $user->firstname . $user->lastname]);
        }
        return redirect()->back()->with('success', 'کاربر با موفقیت تغییر یافت.');
    }

    /**
     * Cert Image Update.
     */
    public function certUpdate(Request $request, User $user)
    {
        $validate = Validator::make($request->all(), [
            "file" => 'required|image|mimes:jpeg,jpg|max:1000',
        ]);

        if ($validate->fails() and !$request['file']->isValid()) {

            return response()->json(["errore" => $validate->errors()], 301);
        }

        $picture = $request['file'];

        $path = $picture->store('public/certs');

        $user->cert = basename($path);
        $user->save();

        return response()->json(['success' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'کاربر با موفقیت حذف شد.');
    }
}
