<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\Lecture;

class HomeworkController extends Controller
{
    public function addEditHomework($lecture_id, $homework_id = 0)
    {
        if (!$homework_id) {

            $lecture = Lecture::findorFail($lecture_id);
            return view('training.homework_edit', ['lecture' => $lecture]);
        }
        $homework = Homework::findorFail($homework_id);
        return view('training.homework_edit', ['lecture' => $homework->lecture, 'homework' => $homework]);
    }
    public function saveEditAddHomework(Request $request)
    {
        $lecture_id = $request['lecture_id'];
        $homework_id = $request['homework_id'];

        $homework = null;
        if (!$homework_id) {
            $homework = new Homework;
        } else {
            $homework = Homework::findorFail($homework_id);
        }
        $homework->lecture_id = $lecture_id;
        $homework->name = $request['name'];
        $homework->description = $request['description'];
        $homework->save();
        if ($request['flag'] == true) {
            $student_id = $request['student_id'];
            return redirect('/admin/grades-absences/' . $student_id . "/" . $homework->lecture->module->training_id . '/' . $homework->lecture->module_id . '/' . $lecture_id . '/')->with('status', 'Homework was successfully updated!');
        }
        return redirect('/admin/training/create/' . $homework->lecture->module->training_id . '/' . $homework->lecture->module_id . '/' . $lecture_id . '/')->with('status', 'Homework was successfully updated!');
    }
    public function deleteHomework($id = null)
    {
        if ($id) {
            $homework = Homework::findOrFail($id);
            $grade_status = $homework->gradeStatus;

            if ($grade_status->count() > 0) {
                $grade_status->each(function ($status) {
                    $status->delete();
                });
            }
            $homework->delete();
        }
        return redirect('/admin/training/create/' . $homework->lecture->module->training_id . '/' . $homework->lecture->module_id . '/' . $homework->lecture->id . '/')->with('status', 'Homework deleted successfully.');
    }
}
