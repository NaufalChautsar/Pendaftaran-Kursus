<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Back-End.Login.Login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('fail', 'NPM dan Password belum terdaftar');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}
