<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index(){
        return view('home');
    }

    public function dashboard_user(){
        return view('dashboard_user');
    }


    public function registration(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function registration_submit(Request $request){
        $token = hash('sha256' , time());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'pending';
        $user->token = $token;
        $user->save();
        $verification_link = url('registration/verify/' . $token. '/' .$request->email);
        $subject = 'Registration confirmation';
        $message = 'Please click on this link: <br>' . '<a href=" ' . $verification_link . ' "> Click Here </a>';
        Mail::to($request->email)->send(new WebsiteMail($subject , $message));
        echo 'email is sent';
    }

    public function registration_verify($token , $email){
        $user = User::where('token' , $token)->where('email' , $email)->first();
        if(!$user){
            return redirect()->route('login');
        }
        $user->status = 'active';
        $user->token = ' ';
        $user->update();
    }

    public function login_submit(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active'
        ];
        if(Auth::attempt($credentials)){
                return redirect()->route('dashboard_user');
            }
            else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function forget_password(){
        return view('forget_password');
    }

    public function forget_password_submit(Request $request){
        $token = hash('sha256', time());
        $user = User::where('email' , $request->email)->first();
        if(!$user){
            dd('Email is Invalid');
        }
        $user->token = $token;
        $user->update();
        $reset_link = url('reset-password/' . $token. '/' .$request->email);
        $subject = 'Reset Password';
        $message = 'Please Click on the follow link: <br> <a href=" '.$reset_link.' "> Click Here </a>';
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));
        echo 'check your email';
    }

    public function reset_password($token, $email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect()->route('login');
        }
        return view('reset_password' , compact('email' , 'token'));
    }

    public function reset_password_submit(Request $request){
        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        $user->token = ' ';
        $user->password = Hash::make($request->new_password);
        $user->update();
        return 'password is updated';
    }

}
