<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Authorization\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        $pageTitle = __('general.forgot_password');
        return view('website.auth.forgot-password',compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $model = User::where('email', $request->input('email'))->first();
        if ($model){
            $token = csrf_token();
            try {
                Mail::to($model->email)->send(new ForgotPassword($model,$token));
            } catch (\Exception $e) {
                return redirect()->back()->with('error',$e->getMessage());
            }
            return redirect()->back()->with('success',__('general.we_have_email_your_password_reset_link'));
        }
        return redirect()->back()->with('error',__('general.invalid_email'));
    }

    public function resetPassword(Request $request, $token)
    {
        $pageTitle = __('general.reset_password');
        $params = [
            'pageTitle' => $pageTitle,
            'email' => $request->get('email'),
            'token' => $token,
        ];
        return view('website.auth.reset-password',$params);
    }

    public function resetPasswordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'confirm_password' => 'required|same:password',
        ]);
        $model = User::where('email', $request->input('email'))->update([
            'password' => Hash::make($request->input('password')),
            'current_password' => $request->input('password'),
        ]);
        if ($model){
            return redirect()->route('website.login')->with('success',__('general.reset_password_successfully'));
        }
        return redirect()->back()->with('error',__('general.something_went_wrong'));
    }
}
