<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Lecture;

class LectureController extends Controller
{
    public function addEditLecture($module_id, $lecture_id = 0) {
        if(!$lecture_id){
            $module = Module::findorFail($module_id);
            return view('training.lecture_edit', ['module'=>$module]);
        }
        $lecture = Lecture::findorFail($lecture_id);
        return view('training.lecture_edit', ['module'=>$lecture->module,'lecture'=>$lecture]);
    }
    public function saveEditAddLecture(Request $request) {
        $module_id = $request['module_id'];
        $lecture_id = $request['lecture_id'];
        $lecture = null;
        if(!$lecture_id){
            $lecture = new Lecture;
        }
        else{
            $lecture = Lecture::findorFail($lecture_id);
        }
            $lecture->module_id = $module_id;
            $lecture->name = $request['lecture_name'];
            $lecture->description = $request['description'];
           
            $lecture->save();
            return redirect('/admin/training/create/'. $lecture->module->training_id . '/' . $module_id . '/' . $lecture_id)->with('status', 'Lecture was successfully updated!');
    }

    public function deleteLecture($id)
    {
        if ($id) {
            $lecture = Lecture::findOrFail($id);
            $homework_controller = new HomeworkController;
            if (!$lecture->homework->isEmpty()) {
                foreach ($lecture->homework as $homework) {
                    $homework_controller->deleteHomework($homework->id);
                }
            }
            $absences = $lecture->absence;
            if ($absences->count() > 0) {
                $absences->each(function ($status) {
                    $status->delete();
                });
            }
            $lecture->delete();
        }
        return redirect('/admin/training/create/' . $lecture->module->training_id . '/' . $lecture->module_id . '/')->with('status', 'Lecture deleted successfully.');
    }
}
