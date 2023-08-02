<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Training;

class PermissionController extends Controller
{
    private function getUserPermission(User $user) {
        return $user->permision;
    }
    public function showPermissionPage() {
        $user = User::findorFail(3);
        print_r($this->getUserPermission($user));
        return view('permission.user_permission');
    }
    
    

    public function AddEditPermission($id) {
        $user = User::findorfail($id);
        $new_trainings = Training::whereDoesntHave('user', function ($query) use ($user) {
            $query->where('user_id', $user->id);})->get();
        return view('permission.add_edit',['user'=>$user], ['new_trainings'=>$new_trainings]);
    }

    public function savePermission($user_id, $training_id) {
        $user = User::findorFail($user_id);
        $training = Training::findorFail($training_id);
        $exists = $user->training()->wherePivot('training_id', $training->id)->exists();
        $user_role = $user->role->code;
        if(!$exists) {
            $user->training()->attach($training->id);
            return redirect('/admin/permission/add-edit/'. $user->id .'s')->with('status', 'Details were added!');
        }
        return redirect('/admin/permission/add-edit/'. $user->id .'s')->with('status', 'User already has this permission!');
    }

    public function deletePermission($user_id, $training_id){
        $user = User::findorFail($user_id);
        $training = Training::findorFail($training_id);
        $exists = $user->training()->wherePivot('training_id', $training->id)->exists();
        $user_role = $user->role->code;
        if($exists) {
            $user->training()->detach($training->id);
            return redirect('/admin/permission/add-edit/'. $user->id .'s')->with('status', 'Permission was deleted!');
        }
        return redirect('/admin/permission/add-edit/'. $user->id .'s')->with('status', 'This permission does not exist!');
    }

}
