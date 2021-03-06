<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout', 'logoutUser']);
    }

    public function showLoginForm() {
        return view('authAdmin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt($credential, $request->member)){
            // If login succesful, then redirect to their intended location
            return redirect()->route('admin.home');
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->with('status', 'Gagal Login')->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
