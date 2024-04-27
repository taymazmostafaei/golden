<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PANEL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(){
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.register', ['pageConfigs' => $pageConfigs]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'lastname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'national_id' => ['required', 'ir_national_code', 'unique:users'],
            'phone' => ['required', 'ir_mobile:zero', 'unique:users'],
            'telphone' => ['required', 'ir_phone_with_code'],
            'address' => ['required', 'persian_alpha_eng_num', 'string', 'max:64'],
            'cert' => 'required|image|mimes:jpeg,jpg|max:500'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['cert']->isValid()) {
            $picture = $data['cert'];
    
            $path = $picture->store('public/certs');
        }else {
            return false;
        }

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'national_id' => $data['national_id'],
            'phone' => $data['phone'],
            'telphone' => $data['telphone'],
            'address' => $data['address'],
            'status' => 'wait',
            'access' => json_encode([
                'users' => 1,
                'orders' => 1,
                'retails' => 1,
                'news' => 1,
                'setting' => 1,
                'admin_dashboard' => 1,
            ]),
            'cert' => basename($path)
        ]);

        return $user;
    }
}
