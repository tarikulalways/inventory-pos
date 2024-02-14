<?php

namespace App\Http\Controllers;

use App\Mail\otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // login view
    public function loginView()
    {
        if(!Auth::check()){
            return view('admin.auth.login');
        }else{
            return redirect()->back();
        }
    }
    // login
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.view');
        } else {
            session()->flash('error','Email or Password is wrong!');
            return redirect()->route('login.view');
        }
    }
    // logout system
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');

    }
    // forget view
    public function forgetView()
    {
        return view('admin.auth.forget');
    }
    // forget post
    public function forgetPost(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        if ($count === 1) {
            // create otp
            $sendOtp = rand(1000, 9999);
            // send otp with email
            Mail::to($request->email)->send(new otp($sendOtp));
            User::where('email', $request->email)->update([
                'otp' => $sendOtp,
            ]);
            session()->flash('otpsend', 'OPT send successfull');
            return redirect()->route('veryfyOpt');
        }else{
            return redirect()->back()->with('erroremail', 'Your Email is wrong');
        }
    }
    // veryfy otp view
    function veryfyOpt(){
        return view('admin.auth.otp');
    }
    // veryfy otp post
    function veryfyOptPost(Request $request){
        $getOtp = $request->input('otp');
        $count = User::where('otp', $getOtp)->count();
        if($count === 1){
            $getEmail = User::where('otp', $getOtp)->select('email')->get();
            foreach($getEmail as $email){
                $userEmail = $email['email'];
            }
            return view('admin.auth.changepwd', compact('getOtp', 'userEmail'));
        }else{
            return redirect()->back()->with('errorotp', 'Your TOP is wrong');
        }
    }

    // chagne password view
    function changePwdView(){
        return view('admin.auth.changepwd');
    }

    // change password
    function changePwd(Request $request){
        $veryfyOtp = $request->input('veryfyOtp');

        $newPwd = $request->input('newPwd');
        $confimrPwd =$request->input('confimrPwd');

        if($newPwd === $confimrPwd){
            User::where('otp', $veryfyOtp)->update([
                'password' => Hash::make($confimrPwd),
                'otp' => '0'
            ]);
            return redirect()->route('login.view');
        }else{
          return redirect()->route('changepwd.view')->with('wrongPwd', 'Password not match');
        }
    }

    // profile
    function profile(){
        return view('admin.profile.index');
    }
    // update profile
    function updatePfile(Request $request){
        $email = Auth::user()->email;
        $newpass = $request->input('newpass');
        $confirmpass = $request->input('confirmpass');

        if($newpass === $confirmpass){
            User::where('email', $email)->update([
                'password' => Hash::make($confirmpass)
            ]);
            Auth::logout();
            return redirect()->route('login.view');
        }else{
            return redirect()->back()->with('wrong', 'Password dont match');
        }

    }
}
