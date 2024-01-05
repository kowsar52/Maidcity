<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function create()
    {
        $pageTitle = __('general.login');
        return view('website.auth.login',compact('pageTitle'));
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],$request->input('remember'))) {
            if (Auth::user()->email_verified_at == null){
                Auth::logout();
                return back()->withErrors([
                    'email' => __('general.your_email_is_not_verified'),
                ])->onlyInput('email');
            }
            if (!Auth::user()->active){
                Auth::logout();
                return back()->withErrors([
                    'email' => __('general.your_account_disabled'),
                ])->onlyInput('email');
            }
            $request->session()->regenerate();
            return redirect()->route('website.home-page');
        }

        return back()->withErrors([
            'email' => __('general.the_provided_credentials'),
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('website.home-page');
    }
}
