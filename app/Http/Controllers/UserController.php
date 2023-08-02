<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\EditStudentRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('code', ROLE::ROLE_USER);
        })->orWhereHas('role', function ($query) {
            $query->where('code', ROLE::ROLE_ADMIN);
        })->get();

        return view('admin.users_page', compact('users'));
    }
    public function addUser($id=0)
    {
        $user = User::find($id);
        $roles = Role::all();
        /*if ($) {
                abort(404, 'Students not found');
            }*/

        return view('admin.user_add', ['user'=>$user, 'roles'=> $roles]);
    }

    public function storeUser(UserRequest $request) {
        $validatedData = $request->validated();
            $user = new User;

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->username = $validatedData['username'];
        $user->role_id = 5;
        $user->save();
        return redirect('/admin/users')->with('status', 'Details were added!');
    }

    public function updateUser($id, EditUserRequest $request) {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->username = $validatedData['username'];
        $user->role_id = $request['role'];
        $user->save();
        
        return redirect('/admin/users')->with('status', 'Details were updated!');
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/student-table')->with('status', 'User deleted successfully.');
    }

    public function viewMyDetails() {
        $user = Auth::user();
        return view('user.view_my_details', ['user'=>$user]);
    }

    public function editMyDetails() {
        $user = Auth::user();
        return view('user.user_add', ['user'=>$user]);
    }

    public function updateMydetails($id, EditStudentRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->language = $validatedData['language'];
        $user->repository = $validatedData['repository'];
        $user->info = $validatedData['info'];
        $user->link = $validatedData['link'];
        $user->web_page_name = $validatedData['web_page_name'];
        $user->messenger_name = $validatedData['messenger_name'];
        $user->username = $validatedData['username'];
        $user->hoby = $validatedData['hoby'];
        $user->skils = $validatedData['skils'];
        
        $user->save();

        return redirect('viewMyDetails')->with('status', 'Details were updated!');
    }

    public function changeMyPassword() {
        return view('user.change_password');
    }

    public function saveNewPassword($id, ChangePasswordRequest $request) {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        $user->password = $validatedData['new_password2'];
        $user->save();
        return back()->with("status", "Password changed successfully!");
    }

}
