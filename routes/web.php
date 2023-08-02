<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GradesAbsencesController;
use App\Http\Controllers\StudentDiaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\IsEmployeer;
use App\Http\Middleware\IsTeacher;
use App\Http\Middleware\IsAdmin;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
    Route::get('dashboard/dashboard', 'HomeController@dashboard')->name('dashboard.dashboard');
    Route::get('/blog', 'HomeController@blog')->name('home.blog');
    Route::get('/blog_details', 'HomeController@blog_details')->name('home.blog_details');

    Route::group(['middleware' => ['guest']], function() {
       
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        Route::get('/forgot-password-form', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
        Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('viewMyDetails', [UserController::class, 'viewMyDetails']);
        Route::get('editMyDetails', [UserController::class, 'editMyDetails']);
        Route::post('updateMydetails/{id}', [UserController::class, 'updateMydetails']);
        Route::get('changeMyPassword', [UserController::class, 'changeMyPassword']);
        Route::post('saveNewPassword/{id}', [UserController::class, 'saveNewPassword']);

    });
});

Route::get('/training/{id}', [HomeController::class, 'showTraining'])->name('training.show');

Route::get('/module/{id}', [HomeController::class, 'showModule']) ->name('module.show');
Route::get('guest/trainings', [HomeController::class, 'guestTrainings']);

Route::middleware('isAdmin')->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');

    Route::get('/admin/add-student/{id?}', [StudentController::class, 'addStudent']);
    Route::post('/admin/store-student', [StudentController::class, 'storeStudent']);
    Route::post('/admin/update-student/{id}', [StudentController::class, 'updateStudent']);
    Route::delete('/admin/student-delete/{id}', [StudentController::class, 'studentDelete']);
    
    Route::get('/admin/users/', [UserController::class, 'showUsers']);
    Route::get('/admin/add-user/{id?}', [UserController::class, 'addUser']);
    Route::post('/admin/store-user', [UserController::class, 'storeUser']);
    Route::post('/admin/update-user/{id}', [UserController::class, 'updateUser']);
    Route::delete('/admin/user-delete/{id}', [UserController::class, 'userDelete']);

    Route::get('/admin/teachers', [TeacherController::class, 'showTeachers']);
    Route::get('/admin/add-teacher/{id?}', [TeacherController::class, 'addTeacher']);
    Route::post('/admin/store-teacher', [TeacherController::class, 'storeTeacher']);
    Route::post('/admin/update-teacher/{id}', [TeacherController::class, 'updateTeacher']);
    Route::delete('/admin/teacher-delete/{id}', [TeacherController::class, 'teacherDelete']);

    Route::get('/admin/employeers', [EmployeerController::class, 'showEmployeers']);
    Route::get('/admin/add-employeer/{id?}', [EmployeerController::class, 'addEmployeer']);
    Route::post('/admin/store-employeer', [EmployeerController::class, 'storeEmployeer']);
    Route::post('/admin/update-employeer/{id}', [EmployeerController::class, 'updateEmployeer']);
    Route::delete('/admin/employeer-delete/{id}', [EmployeerController::class, 'employeerDelete']);

    Route::get('/admin/permission',[PermissionController::class, 'showPermissionPage']);
    Route::get('/admin/permission/teachers', [TeacherController::class, 'showTeachersPermission']);
    Route::get('/admin/permission/students', [StudentController::class, 'showStudentsPermission']);
    Route::get('/admin/permission/employeers', [EmployeerController::class, 'showemployeersPermission']);
    Route::get('/admin/permission/add-edit/{id}', [PermissionController::class, 'AddEditPermission']);
    Route::get('/admin/permission/{user_id}/{training_id}', [PermissionController::class, 'savePermission']);
    Route::delete('/admin/permission/delete/{user_id}/{training_id}',[PermissionController::class, 'deletePermission']);


});
Route::middleware('isTeacher')->group( function () {
    Route::get('/admin/student-table', [StudentController::class, 'viewAllStudents']);
    Route::get('/admin/grades-absences/{student_id}/{training_id?}/{module_id?}/{lecture_id?}', [StudentController::class, 'gradesAbsences']);
    Route::get('/admin/module/edit/{training_id}/{module_id?}', [ModuleController::class, 'addEditModule']);
    Route::post('/admin/module/save-module/', [ModuleController::class, 'saveEditAddModule']);
    Route::get('/admin/lecture/edit/{module_id}/{lecture_id?}', [LectureController::class, 'addEditLecture']);
    Route::post('admin/lecture/save-lecture/{module_id}/{lecture_id?}', [LectureController::class, 'saveEditAddLecture']);
    Route::get('/admin/homework/edit/{lecture_id}/{homework_id?}', [HomeworkController::class, 'addEditHomework']);
    Route::post('/admin/homework/save-homework/{lecture_id}/{homework_id?}', [HomeworkController::class, 'saveEditAddHomework']);
    Route::delete('/admin/homework/delete/{id}',[HomeworkController::class, 'deleteHomework']);
    Route::delete('/admin/lecture/delete/{id}',[LectureController::class, 'deleteLecture']);
    Route::delete('/admin/module/delete/{id}', [ModuleController::class, 'deleteModule']);
    Route::delete('/admin/training/delete/{id}', [TrainingController::class, 'deleteTraining']);
    Route::post('/admin/grades/submit', [StudentController::class, 'saveGradesAbsences']);
    Route::get('/admin/grades/addTask/{student_id}/{lecture_id}', [StudentController::class, 'addTask']);

    Route::get('/admin/training/create/{training_id?}/{module_id?}/{lecure_id?}{homework_id?}', [TrainingController::class, 'trainingAdd']);
    Route::post('/admin/training/save-training/', [TrainingController::class, 'saveEditAddTraining']);
    Route::get('/admin/training/edit/{training_id?}', [TrainingController::class, 'addEditTraining']);
    Route::get('/admin/trainings', [TrainingController::class, 'showAllTrainings']);
});

Route::middleware('isEmployeer')->group( function () {
    Route::get('showStudentsByTraining', [TrainingController::class, 'showTrainingsByPermission']);
    Route::get('studentsPerformance/{training_id}', [StudentController::class, 'showStudentsDiary']);
    Route::get('student_details/{student_id}', [StudentController::class, 'showStudentDetails']);
});

Route::middleware('isStudent')->group(function () {
    Route::get('enrolledTrainings', [TrainingController::class, 'showEnrolledTrainings']);
    Route::get('myPerformance/{training_id}', [StudentController::class, 'showMyPerformance']);
    Route::get('my_details/{student_id}', [StudentController::class, 'showStudentDetails']);
});

Route::get('menus',[MenuController::class, 'index']);
Route::get('menus-show',[MenuController::class, 'show']);
Route::post('menus',[MenuController::class, 'store'])->name('menus.store');

