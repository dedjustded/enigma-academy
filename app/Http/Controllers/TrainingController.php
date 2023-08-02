<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class TrainingController extends Controller
{

    public function showAllTrainings()
    {
        $trainings = Training::all();
        return view('home.main', ['trainings' => $trainings]);
    }
    public function trainingAdd($training_id = 0, $module_id = 0, $lecture_id = 0, $homework_id = 0)
    {
        if ($homework_id) {
            $homework = Homework::findOrFail($homework_id);
            return view('training.final_step', ['training' => $homework->lecture->module->training, 'module' => $homework->lecture->module, 'lecture' => $homework->lecture, 'homework' => $homework]);
        }
        if ($lecture_id) {
            $lecture = Lecture::findorFail($lecture_id);
            return view('training.homework_add', ['training' => $lecture->module->training, 'module' => $lecture->module, 'lecture' => $lecture, 'homework' => $lecture->homework]);
        }
        if ($module_id) {
            $training = Training::findorFail($training_id);
            $module = $training->module()->where('id', $module_id)->firstOrFail();
            return view('training.lecture_add', ['training' => $training, 'module' => $module]);
        }
        if ($training_id) {
            $training = Training::findorFail($training_id);
            return view('training.module_add', ['training' => $training]);
        }

        $trainings = Training::all();
        return view('training.training_add', ['trainings' => $trainings]);
    }
    public function saveEditAddTraining(Request $request)
    {
        $training_id = $request['training_id'] ?? null;
        if (!$training_id) {
            $training = new Training;
        } else {
            $training = Training::findorFail($training_id);
        }
        $training->course_name = $request['training_name'];
        $training->description = $request['description'];
        $training->schedule_from = $request['schedule_from'];
        $training->schedule_to = $request['schedule_to'];
        $training->save();
        return redirect('/admin/training/create/' . $training->id)->with('status', 'Training was successfully updated!');
    }

    public function addEditTraining($training_id = null)
    {
        if (!$training_id) {
            return view('training.training_edit');
        }
        $training = Training::findorFail($training_id);
        return view('training.training_edit', ['training' => $training]);
    }

   

    public function deleteTraining($id)
    {
        $training = Training::findOrFail($id);
        $module_controller = new ModuleController;
        foreach ($training->module as $module) {
            $module_controller->deleteModule($module->id);
        }
        $training->user()->detach();
        $training->delete();
        return redirect('/admin/training/create/')->with('status', 'Lecture deleted successfully.');
    }

    public function showTrainingsByPermission()
    {

        if (Auth::user()->role->code == Role::ROLE_ADMIN || Auth::user()->role->code == Role::ROLE_TEACHER) {
            $trainings = Training::all();
        } else {
            $trainings = Auth::user()->training;
        }
        return view('training.employeer_trainings', ['trainings' => $trainings]);
    }

    public function showEnrolledTrainings()
    {
        $trainings = Auth::user()->training;
        return view('training.show_enrolled_trainings', ['trainings' => $trainings, 'choosed_training' => null]);
    }
}
