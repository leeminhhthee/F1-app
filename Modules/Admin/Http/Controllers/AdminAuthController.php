<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.home');
        }
 
        return redirect()->back();
    }
    public function logoutAdmin(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }
}
