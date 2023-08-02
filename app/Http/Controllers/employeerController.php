<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\Role;

class EmployeerController extends Controller
{
    public function showEmployeers() {
        $employeers = User::whereHas('role', function ($query) {
            $query->where('code', 'employeer');})->get();
        return view('admin.employeer_table', compact('employeers'));
    }

    public function addEmployeer($id = 0) {
        $employeer = User::find($id);
        /*if ($) {
            abort(404, 'Students not found');
        }*/
        $roles=Role::all();
        return view('admin.employeer_add', ['employeer'=>$employeer, 'roles'=> $roles]);
    }

    public function storeEmployeer(UserRequest $request) {
        $validatedData = $request->validated();
            $employeer = new User;

        $employeer->first_name = $validatedData['first_name'];
        $employeer->last_name = $validatedData['last_name'];
        $employeer->email = $validatedData['email'];
        $employeer->phone = $validatedData['phone'];
        $employeer->country = $validatedData['country'];
        $employeer->city = $validatedData['city'];
        $employeer->username = $validatedData['username'];
        $employeer->role_id = 4;
        $employeer->save();
        return redirect('/admin/employeers')->with('status', 'Details were added!');
    }

    public function updateEmployeer($id,EditUserRequest $request) {
        $validatedData = $request->validated();
        $employeer = User::findOrFail($id);

        $employeer->first_name = $validatedData['first_name'];
        $employeer->last_name = $validatedData['last_name'];
        $employeer->email = $validatedData['email'];
        $employeer->phone = $validatedData['phone'];
        $employeer->country = $validatedData['country'];
        $employeer->city = $validatedData['city'];
        $employeer->username = $validatedData['username'];
        $employeer->role_id = $request['role'];
        $employeer->save();
        
        return redirect('/admin/employeers')->with('status', 'Details were updated!');
    }
    public function employeerDelete($id) {
    
        $employeer = User::findOrFail($id);
        $employeer->delete();   
        return redirect('/admin/employeers')->with('status', 'User deleted successfully.');
    }
    public function showEmployeersPermission() {
        $employeers = User::whereHas('role', function ($query) {
            $query->where('code', 'employeer');})->get();
        return view('permission.users_permission', ['users'=> $employeers]);
    }
}
