<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        $pageTitle = __('general.register');
        return view('website.auth.register', compact('pageTitle'));
    }

    public function store(RegisteredUserRequest $request)
    {
        $result = $request->createData();
        if ($result['success']){
            return redirect()->route('website.home-page')->with('success', __('general.user_signup_successfully'));
        }

        return redirect()->route('website.register')->with('error', __('general.something_went_wrong'));
    }
}
