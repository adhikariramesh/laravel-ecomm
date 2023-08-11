<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\registerMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class LoginConroller extends Controller
{
    public function index(){

        return view('frontend.login');

    }


    public function registerForm(){

        return view('frontend.registerForm');

    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        // return $name;
        // // return $request;
        // die;
        $user = User::where('email', $request->email)->first();
        $token = uniqid(20);


        if(is_null($user)){

            $insert = new User;
            $insert->name = $name;
            $insert->email = $email;
            $insert->password = Hash::make($password);
            $insert->email_token = $token;
            $insert->save();

            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'token' => $token,
            ];


            Mail::to($request->email)->send(new registerMail($details));

            return redirect('/login')->with('message','allready sand verifycation link......... please verify your email ');
        }
        else{
            return redirect('/register')->with('message', 'this email allready exists');
        }


    }


    public function verify($token){

        return $token;
    }


    public function login(Request $request){

        $user = User::where('email', $request->email)->first();


        if($user && Hash::check($request->password, $user->password)){

            $loginData = [
                'name' => $user->name,
                'email' => $request->email,
                'user_type' => 0,
            ];

            session()->put('login', $loginData);

            if($user->user_type == 1){
                $loginData = [
                    'name' => $user->name,
                    'email' => $request->email,
                    'user_type' => 1,
                ];

                session()->put('login', $loginData);
                return redirect('/admin');
            }
            // Redirect::setintentendedUrl(url()->previous());
            // return redirect()->intended();
            return redirect('/');
        }
        else{
            return redirect('/login')->with('message', 'Your email and password invilide');
        }

    }


    public function logout(){

        session()->flush('login');
        return redirect()->back();
    }
}
