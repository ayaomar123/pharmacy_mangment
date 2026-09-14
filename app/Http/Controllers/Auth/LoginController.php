<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use QCod\Settings\Setting\Setting;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the login form.
     *
     * The login route points here instead of showLoginForm() so the view can
     * render the logo configured in the application settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "login To Aya Pharamcy";
        $logo = Setting::query()->where('name', 'logo')->value('val');

        return view('auth.login', compact('title', 'logo'));
    }

    /*
    | login() is intentionally not overridden. The AuthenticatesUsers trait
    | already validates the credentials, applies the ThrottlesLogins lockout,
    | regenerates the session id after a successful attempt (which prevents
    | session fixation) and returns the failure as a validation error on the
    | email field, which the login view renders.
    */
}
