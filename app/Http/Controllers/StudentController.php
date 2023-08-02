<?php

namespace App\Http\Controllers;
use App\Http\Requests\GradeAbsenceRequest;
use App\Models\Lecture;
use App\Models\User;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\EditStudentRequest;
use App\Models\Absence;
use App\Models\GradeStatus;
use App\Models\Homework;
use App\Models\Role;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function addStudent($id = 0)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('student.student_add', ['user' => $user, 'roles' => $roles]);
    }


    public function storeStudent(StudentRequest $request)
    {
        $validatedData = $request->validated();
        $user = new User;

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
        $user->role_id = 3;
        $user->save();
        return redirect('/admin/student-table')->with('status', 'Details were added!');
    }
    public function viewAllStudents()
    {
        $students = User::whereHas('role', function ($query) {
            $query->where('code', Role::ROLE_STUDENT);
        })->get();
        return view('student.student_table', compact('students'));
    }

    public function updateStudent($id, EditStudentRequest $request)
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
        if($request['role']){
            $user->role_id = $request['role'];
        }
        $user->save();

        return redirect('/admin/student-table')->with('status', 'Details were updated!');
    }

    public function studentDelete($id)
    {

        $student = User::findOrFail($id);
        $student_absences = $student->absence;
        $student_grades = $student->gradeStatus;
        if (!$student_absences->isEmpty()) {
            $student->absence()->delete();
        }
        if (!$student_grades->isEmpty()) {
            $student->gradeStatus()->delete();
        }
        if (!$student->training->isEmpty()) {
            $student->training()->detach();
        }

        $student->delete();
        return redirect('/admin/student-table')->with('status', 'User deleted successfully.');
    }
    public function gradesAbsences($student_id, $training_id = null, $module_id = null, $lecture_id = null)
    {
        $student = User::findOrFail($student_id);

        if ($lecture_id) {
            $training = Training::findOrFail($training_id);
            $module = $training->module()->where('id', $module_id)->firstOrFail();
            $lecture = $module->lecture()->where('id', $lecture_id)->firstOrFail();

            $absence = $lecture->absence->where('user_id', $student_id)->first();
            $grades = $student->gradeStatus;

            return view('student.grades_absences', [
                'student' => $student, 'training' => $training, 'module' => $module, 'lecture' => $lecture,
                'homeworks' => $lecture->homework, 'absence' => $absence, 'grades' => $grades
            ]);
        }
        if ($module_id) {
            $training = Training::findOrFail($training_id);
            $module = $training->module()->where('id', $module_id)->firstOrFail();
            return view('student.grades_absences_lecture', ['student' => $student, 'training' => $training, 'module' => $module, 'lectures' => $module->lecture]);
        }

        if ($training_id) {

            $training = Training::findOrFail($training_id);
            return view('student.grades_absences_module', ['student' => $student, 'training' => $training, 'modules' => $training->module]);
        }

        $student_training = $student->training;
        return view('student.grades_absences_training', ['student' => $student, 'trainings' => $student_training]);
    }

    private function saveAbsences(GradeAbsenceRequest $request)
    {
        if ($request['absence'] || $request['note']) {

            $student_id = $request['student_id'];
            $lecture_id = $request['lecture_id'];

            $absence = Absence::where('user_id', $student_id)->where('lecture_id', $lecture_id)->first();
            if (!$absence) {
                $absence = new Absence;
            }
            $absence->user_id = $student_id;
            $absence->lecture_id = $lecture_id;
            $absence->absence_name = $request['absence'];
            $absence->note = $request['note'];
            $absence->save();
        }
    }

    public function addTask($student_id, $lecture_id)
    {
        return view('student.add_task', ['lecture_id' => $lecture_id, 'student_id' => $student_id]);
    }
    private function saveGrades(GradeAbsenceRequest $request)
    {
        $student_id = $request['student_id'];
        $lecture_id = $request['lecture_id'];
        $lecture = Lecture::findOrFail($lecture_id);
        $homeworks = Homework::where('lecture_id', $lecture_id)->get();

        foreach ($homeworks as $homework) {
            $grade_status = GradeStatus::firstOrCreate([
                'user_id' => $student_id,
                'homework_id' => $homework->id
            ]);

            $grade_status->has_homework = $request["has_homework" . $homework->id] ?? false;
            $grade_status->not_works = $request["not_works" . $homework->id] ?? false;
            $grade_status->on_time = $request["on_time" . $homework->id] ?? false;
        
            $grade_status->grade = $request["grade" . $homework->id] ?? null;
            $grade_status->save();
        }
    }

    public function saveGradesAbsences(GradeAbsenceRequest $request)
    {
        if (!is_null($request['absence'])) {
            $this->saveAbsences($request);
        }
        $this->saveGrades($request);
        return redirect('/admin/student-table')->with('status', 'Data successfully updated.');
    }

    public function showStudentsPermission()
    {
        $students = User::whereHas('role', function ($query) {
            $query->where('code', Role::ROLE_STUDENT);
        })->get();
        return view('permission.users_permission', ['users' => $students]);
    }

    public function showStudentsDiary($training_id)
    {
        $training = Training::findOrFail($training_id);
        $lectures = $training->module->flatMap(function ($module) {
            return $module->lecture;
        });
        $lectureIds = $lectures->pluck('id')->toArray();
        $total_lectures = $lectures->count();

        $activity = [];
        $students = $training->user()->whereHas('role', function ($query) {
            $query->where('code', Role::ROLE_STUDENT);
        })->get();

        foreach ($students as $student) {
            $student_arr = [];
            array_push($student_arr, $student->id);
            array_push($student_arr, $student->first_name . " " . $student->last_name . "     Username: " . $student->username);
            $late_lectures = $student->absence()->where('absence_name', 'late')->whereIn('lecture_id', $lectureIds)->count();
            $escaped_lectures = $student->absence()->where('absence_name', 'escaped')->whereIn('lecture_id', $lectureIds)->count();
            $not_come_lectures = $student->absence()->where('absence_name', 'didNotCome')->whereIn('lecture_id', $lectureIds)->count();
            $disregarded_lectures = $student->absence()->where('absence_name', 'disregarded')->whereIn('lecture_id', $lectureIds)->count();
            $total_lectures -= $disregarded_lectures;

            $attended_lectures = $total_lectures - ($escaped_lectures + $not_come_lectures + ($late_lectures * 0.15));
            if ($total_lectures > 0) {
                array_push($student_arr, (($attended_lectures / $total_lectures) * 100) . "%");
            } else {
                array_push($student_arr, null);
            }
            $final_score = 0;
            $cnt = 0;

            foreach ($training->module as $module) {
                $homeworks_in_curr_module = $module->lecture->flatMap(function ($lecture) {
                    return $lecture->homework;
                });
                $homeworkIds = $homeworks_in_curr_module->pluck('id')->toArray();
                $avg_grade_module = $student->gradeStatus()->whereNotNull('grade')->whereIn('homework_id', $homeworkIds)->avg('grade');
                if($avg_grade_module > 0) {
                    ++$cnt;
                }
                $final_score += number_format($avg_grade_module, 2);
                array_push($student_arr, number_format($avg_grade_module, 2));
            }
            array_push($student_arr, number_format($final_score / $cnt, 2));

            array_push($activity, $student_arr);
        }

        return view('student.show_students_by_training', [
            'students' => $students, 'choosed_training' => $training,
            'modules' => $training->module, 'activity' => $activity
        ]);
    }

    public function showStudentDetails($student_id)
    {
        $student = User::findOrFail($student_id);
        return view('student.student_details', ['student' => $student]);
    }
    public function showMyPerformance($training_id)
    {
        $student = User::findOrFail(Auth::user()->id);
        $training = $student->training->first();
        $modules = $training->module;
        $big_arr = [];
        foreach ($modules as $module) {
            $arr = ["module_name" => $module->name];
            $lecture_ids_in_module = $module->lecture->pluck('id');
            $total_lectures = count($lecture_ids_in_module);
            $late_lectures = $student->absence()->where('absence_name', 'late')->whereIn('lecture_id', $lecture_ids_in_module)->count();
            $escaped_lectures = $student->absence()->where('absence_name', 'escaped')->whereIn('lecture_id', $lecture_ids_in_module)->count();
            $not_come_lectures = $student->absence()->where('absence_name', 'didNotCome')->whereIn('lecture_id', $lecture_ids_in_module)->count();
            $disregarded_lectures = $student->absence()->where('absence_name', 'disregarded')->whereIn('lecture_id', $lecture_ids_in_module)->count();
            $total_lectures -= $disregarded_lectures;
            $attended_lectures = $total_lectures - ($escaped_lectures + $not_come_lectures + ($late_lectures * 0.15));
            if($total_lectures > 0){
                
                array_push($arr, (($attended_lectures / $total_lectures) * 100) . "%");
            }
            else{
                array_push($arr, null);
            }
            $final_score = 0;
            
            $homeworks_in_curr_module = $module->lecture->flatMap(function ($lecture) {
                return $lecture->homework;
            });

            $homeworkIds = $homeworks_in_curr_module->pluck('id')->toArray();
            $avg_grade_module = $student->gradeStatus()->whereNotNull('grade')->whereIn('homework_id', $homeworkIds)->avg('grade');
            $final_score += number_format($avg_grade_module, 2);
            array_push($arr, number_format($avg_grade_module, 2));
            
            array_push($big_arr, $arr);
            foreach ($module->lecture as $lecture) {
                $arr =  [$lecture->name];
                
                array_push($arr, $lecture->absence()->where('user_id', $student->id)->first->absence_name->absence_name ?? null);
                $homeworks_ids_in_curr_lecture = $lecture->homework->pluck('id')->toArray();
                $avg_grade_in_lecture = $student->gradeStatus()->whereNotNull('grade')->whereIn('homework_id', $homeworks_ids_in_curr_lecture)->avg('grade');
                array_push($arr, number_format($avg_grade_in_lecture, 2));
                array_push($big_arr, $arr);
            }
        }
        return view('student.show_my_performance', ['big_arr' => $big_arr]);
    }
}
