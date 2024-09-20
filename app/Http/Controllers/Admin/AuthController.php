<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function index()
    {
        if(auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function store(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $req->input('username');
        $password = $req->input('password');

        try {
            $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);
            $verifyField = $isEmail ? 'email' : 'username';

            if (auth()->guard('admin')->attempt([$verifyField => $username, 'password' => $password, 'role_id' => 1])) {
                // $user = auth()->guard('admin')->user();
                // dd($user, auth()->guard('admin')->check());
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login.index')->with('error', 'Login Username / Password Incorrect');
            }


        } catch (\Exception $e) {
            return redirect()->route('admin.login.index')->with('error', 'Unauthorized user. Access denied!');
        }
    }


    // Logout method
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login.index')->with('success', 'Successfully logged out.');
    }
}
