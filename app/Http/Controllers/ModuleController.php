<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Training;
use App\Http\Controllers\LectureController;

class ModuleController extends Controller
{

    public function addEditModule($training_id, $module_id = 0) {
        if(!$module_id){
            $training = Training::findorFail($training_id);
            return view('training.module_edit', ['training'=>$training]);
        }
        $module = Module::findorFail($module_id);
        return view('training.module_edit', ['training'=>$module->training,'module'=>$module]);
    }
    public function saveEditAddModule(Request $request) {
        $training_id = $request['training_id'];
        $module_id = $request['module_id'];

        $module = null;
        if(!$module_id){

            $module = new Module;
        }
        else{
            $module = Module::findorFail($module_id);
        }
            $module->training_id = $request['training_id'];
            $module->name = $request['module_name'];
            $module->description = $request['description'];
            $module->save();
            return redirect('/admin/training/create/'. $training_id . '/' . $module_id)->with('status', 'Module was successfully updated!');
    }
    public function deleteModule($id)
    {
        if ($id) {
            $module = Module::findOrFail($id);
            $lecture_controller = new LectureController;
            if (!$module->lecture->isEmpty()) {
                foreach ($module->lecture as $lecture) {
                    $lecture_controller->deleteLecture($lecture->id);
                }
                $module->lecture()->delete();
            }
            $module->delete();
            return redirect('/admin/training/create/' . $module->training_id . '/')->with('status', 'Lecture deleted successfully.');
        }
    }
}
