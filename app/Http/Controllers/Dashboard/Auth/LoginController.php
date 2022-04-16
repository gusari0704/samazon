<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    //ログイン後にリダイレクトするURLを指定している
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //ログイン時に使用する認証を指定している
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admins');
    }

    //ログイン画面で使用するビューやログアウト後のリダイレクト先を指定している
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function loggedOut(Request $request)
    {
        return redirect('dashboard.login');
    }
}