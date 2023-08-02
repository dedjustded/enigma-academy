<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\EditUserRequest;

class TeacherController extends Controller
{
    public function showTeachers() {
        $teachers = User::whereHas('role', function ($query) {
            $query->where('code', 'teacher');})->get();
        return view('admin.teachers_table', compact('teachers'));
    }

    public function addTeacher($id = 0) {
        $teacher = User::find($id);
        /*if ($) {
            abort(404, 'Students not found');
        }*/
        $roles = Role::all();
        return view('admin.teacher_add', ['teacher'=>$teacher, 'roles'=> $roles]);
    }

    public function storeTeacher(UserRequest $request) {
        $validatedData = $request->validated();
            $user = new User;

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->username = $validatedData['username'];
        $user->role_id = 2;
        $user->save();
        return redirect('/admin/teachers')->with('status', 'Details were added!');
    }

    public function updateTeacher($id, EditUserRequest $request) {
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
        
        return redirect('/admin/teachers')->with('status', 'Details were updated!');
    }
    public function teacherDelete($id) {
        $user = User::findOrFail($id);
        $user->delete();   
        return redirect('/admin/teachers')->with('status', 'User deleted successfully.');
    }

    public function showTeachersPermission() {
        $teachers = User::whereHas('role', function ($query) {
            $query->where('code', 'teacher');})->get();
        return view('permission.users_permission', ['users'=>$teachers]);
    }
}
