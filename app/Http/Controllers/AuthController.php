<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Auth\SessionGuard;
use App\User;
use DB;


class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function getLoginPage(){
        return view('auth', ['error' => '']);
    }

    public function authenticate(Request $request){
        $cred = $request->only('email', 'password');

        if(Auth::attempt($cred)){
            if($request->remember){
                Cookie::queue($request->email, $request->password, 120);
            }

            return redirect('/');
        }

        $error = "Invalid email or password";
        return view('auth', ['error' => $error]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    public function getRegisterPage(){
        return view('auth', ['error' => '', 'username' => '', 'email' => '']);
    }

    public function registerUser(Request $request){
        $error = "";
        $email = User::get()
                    ->where('email','=',$request->email)
                    ->first();

        if($email){
            $error = "Email already being used";
        } else if(strcmp($request->password, "") == 0){
            $error = "Password must be filled";
        } else if(strlen($request->password) < 3){
            $error = "Password must at least 3 characters";
        } else if(strcmp($request->username, "") == 0){
            $error = "Username must be filled";
        } else if(strcmp($request->email, "") == 0){
            $error = "Email must be filled";
        } else if(strcmp($request->confirm_password, "") == 0){
            $error = "Confirm Password must be filled";
        } else if(strcmp($request->password, $request->confirm_password) != 0){
            $error = "Confirm password must be same with password";
        }

        if(strcmp($error, "") != 0){
            return view('auth', ['error' => $error, 'username' => $request->username, 'email' => $request->email]);
        }

        DB::table('users')->insert([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/Login');
    }
}
