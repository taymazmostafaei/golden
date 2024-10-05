<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\TelegramService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function showRegistrationForm()
    {
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
        if (!(Setting::where('key', 'register')->first())->value) {
            abort(403, 'امکان ثبت نام فعلا وجود ندارد');
            // return redirect()->back()->withErrors('fail', '');
        }

        $east_azerbaijan_cities = [
            "تبریز",
            "مراغه",
            "مرند",
            "میانه",
            "اهر",
            "سراب",
            "بناب",
            "کلیبر",
            "هشترود",
            "شبستر",
            "ملکان",
            "بستان‌آباد",
            "عجب‌شیر",
            "جلفا",
            "ورزقان",
            "اسکو",
            "آذرشهر",
            "خدا‌آفرین",
            "چاراویماق",
            "هریس"
        ];

        return Validator::make($data, [
            'firstname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'lastname' => ['required', 'persian_alpha', 'string', 'max:23'],
            'national_id' => ['required', 'ir_national_code', 'unique:users'],
            'phone' => ['required', 'ir_mobile:zero', 'unique:users'],
            'telphone' => ['required', 'ir_phone_with_code'],
            'address' => ['required', 'persian_alpha_eng_num', 'string', 'max:64'],
            'cert' => 'required|image|mimes:jpeg,jpg|max:500',
            'region' => ['required', function ($attribute, $value, $fail) use ($east_azerbaijan_cities) {
                if (!in_array($value, $east_azerbaijan_cities)) {
                    $fail('شهر انتخاب شده معتبر نیست.');
                }
            }],
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
        } else {
            return false;
        }

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'national_id' => $data['national_id'],
            'phone' => $data['phone'],
            'telphone' => $data['telphone'],
            'address' => $data['address'],
            'region' => $data['region'],
            'access' => [
                'users' => 0,
                'orders' => 0,
                'retails' => 0,
                'news' => 0,
                'setting' => 0,
                'admin_dashboard' => 0
            ],
            'status' => 'wait',
            'cert' => basename($path)
        ]);

        //(new TelegramService())->sendMessage("کاربر $user->firstname $user->lastname ثبت نام کرد.");

        Redirect::to('/login?s=1')->send();

        return $user;
    }
}
