<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function redirectToLogin() {

        if(!auth()->guard('admin')->check()) {
            return redirect()->route('admin.login.index');
        }

        return redirect()->route('admin.dashboard');
    }
    public function dashboard() {
        return view('superAdmin.superAdminDashboard');
    }

}
