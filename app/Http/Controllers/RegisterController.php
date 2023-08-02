<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        auth()->login($user);
        $role = Role::select('id')->where('code', Role::ROLE_USER)->firstOrFail();
        $user->role_id = $role->id;
        $user->save();
        return redirect('/')->with('success', "Account successfully registred!");
    }
}