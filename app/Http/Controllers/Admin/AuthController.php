<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->status == false) {
                return back()->with('warning', 'تم إيقاف عضويتك لا يمكنك تسجيل الدخول');
            }

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('warning', trans('messages.loginFalse'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
