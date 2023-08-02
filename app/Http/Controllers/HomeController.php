<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        $trainings = Training::all();
        return view('home.index', ['trainings' => $trainings]);
    }

   

    public function showTraining($id) {
        $training = Training::findorfail($id);
        return view('training.training_show', ['training' => $training]);
    }

    public function showModule($id) {
        $module = Module::findorfail($id);
        return view('training.module_show', ['module' => $module]);
    }
    public function about()
    {
        return view('home.about');
    }

    public function courses()
    {
        return view('home.courses');
    }
    public function blog()
    {
        return view('home.blog');
    }
    public function blog_details()
    {
        return view('home.blog_details');
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dashboard.teacher_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }
    public function guestTrainings() {
        $trainings = Training::all();
        return view('training.guest_trainings_show', ['trainings'=>$trainings]);
    }
}
