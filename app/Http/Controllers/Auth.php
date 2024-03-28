<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    //Login
    public function login(Request $request)
    {
        try {
            //Validate
            $validate = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(!$validate)
            {
                return redirect()->back()->with('error', 'Validation Error');
            }

            //Check User
            $user = User::where('email', $request->email)->first();

            if(!$user)
            {
                return redirect()->back()->with('error', 'User not found');
            }

            //Check Password
            if(!Hash::check($request->password, $user->password))
            {
                return redirect()->back()->with('error', 'Password not match');
            }

            //Login
            Auth::login($user);

            //Saving User Type
            session(['user-type' => $user['user-type']]);

            return redirect()->route('dashboard');

        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //Register
    public function register(Request $request)
    {
        try {
            //Validate
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if(!$validate)
            {
                return redirect()->back()->with('error', 'Validation Error');
            }

            //Check User
            $user = User::where('email', $request->email)->first();

            if($user)
            {
                return redirect()->back()->with('error', 'User already exist');
            }

            //Insert Data using ORM Method

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login');

        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
