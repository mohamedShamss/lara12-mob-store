<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_login(Request $request)
    {

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'email'     => 'required',
                'password'  => 'required',

            ], [

                'email.required'    => 'Plz Write Your Email',
                'password.required' => 'Plz Write Your Password'
            ]); // Validate the request

            $email      = $request->email;
            $password   = $request->password;

            $user = User::where('email', '=', $email)->first();
            if (isset($user) && $user->hasRole('admin')) {

                if (Auth::attempt(['email' => $email, 'password' => $password])) {

                    $request->session()->regenerate();

                    return redirect()->intended('dashboard');
                } else {

                    return redirect()->back()->with('msg', 'Can\'t Access To This Page');
                }
            } else {

                return redirect()->back()->with('msg', 'Password Not Correct');
            }
        } else {

            return redirect()->route('login');
        }
    } // admin_login
}