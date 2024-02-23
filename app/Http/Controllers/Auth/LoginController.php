<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserLoged;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Use username in auth.
     *
     * @return void
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.login', ['pageConfigs' => $pageConfigs]);
    }


        /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        #check is it get mobile page or send code page
        if ($request->phone) {
            $request->validate([
                'phone' => ['required', 'ir_mobile:zero', 'exists:users']
            ]);

            $code = rand(100000,999999);
            $mobile = $request->phone;
            Cache::put($request->phone, $code, 120);
            return view('auth.mobilecode',compact('code','mobile'), ['pageConfigs' => ['myLayout' => 'blank']]);
        }

        if ($request->codecheck) {
            $request->validate([
                'code1' => ['required'],
                'code2' => ['required'],
                'code3' => ['required'],
                'code4' => ['required'],
                'code5' => ['required'],
                'code6' => ['required'],
            ]);
            #plus each input code
            $sendedCode = $request->code1 . $request->code2 . $request->code3 . $request->code4 . $request->code5 . $request->code6;
            $cachedCode = Cache::get($request->codecheck);
            if ($sendedCode == $cachedCode) {
                $user = User::where('phone', $request->codecheck)->first();
                Auth::loginUsingId($user->id, remember:true);
                $token = Str::random(120);
                return redirect(RouteServiceProvider::PANEL);
            }
            $code = $cachedCode;
            $mobile = $request->codecheck;
            $wrongcode = 'کد تایید نامعتبر است';
            return view('auth.mobilecode', compact('mobile', 'code', 'wrongcode'), ['myLayout' => 'blank']);
        }

    }

    /**
     * Login with national code and password
     * @return void
     */
    public function national(Request $request){
        Auth::attempt([
            'national_code' => $request->national_code,
            'password' => $request->password
        ]);
        return redirect(RouteServiceProvider::PANEL);
    }

    /**
     * Redirect to login page when logout
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
