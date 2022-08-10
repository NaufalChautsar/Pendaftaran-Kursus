<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/Kursus';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'npm' => 'required',
            'password' => 'required',
        ]);

        if (!(Auth::guard('web')->attempt(['npm' => $request->npm, 'password' => $request->password]))) { 
            return back()->with('fail', 'Ada yang salah dengan email dan password kamu');
        } else {
            return redirect('');
        }
    }
}
