<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 
class ForgotPasswordController extends Controller
{

    public function showForgetPasswordForm(){
        return view('auth.forgot_password');
    }

    public function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.forgot_password', ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have emailed your password reset link!');        
    }
    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatedPassword = DB::table('passwor_resets')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
        if(!$updatedPassword){
            return back()->withInput()->with('error', 'Invalid Token');
        }
        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect('/login')->with('message', 'Your passwor is changed');
    }
}