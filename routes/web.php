<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
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


//Route::get('/studentlogin',[StudentController::class,'studentlogin']);
//Route::get('/teacherlogin',[TeacherController::class, 'teacherlogin']);
//Route::get('/adminlogin',[AdminController::class, 'adminlogin']);
//Route::post('/store-login', [AdminController::class,'storeLogin']);
//Route::post('/store-student-login', [StudentController::class,'storeStudentLogin']);
//Route::get('/teachers',[TeacherController::class, 'teachers']);
//Route::post('/store-teacher-login', [TeacherController::class,'storeTeacherLogin']);

Route::get('/login',[AuthController::class, 'login']);
Route::post('/store-login', [AuthController::class,'storeLogin']);



Route::middleware(['isLoggedIn','isAdmin'])->group(function () {

 Route::get('/registration',[StudentController::class, 'registration']);
 Route::post('/store-student',[StudentController::class, 'storeStudent']);
//Route::get('/home',[AdminController::class, 'index']);
 Route::get('/home',[AuthController::class,'index']);

 Route::get('/studentlist',[StudentController::class, 'studentlist'])->name('student_list');
 Route::get('/create',[AdminController::class, 'create'])->name('course_create'); 
 Route::get('/courseassign',[AdminController::class, 'courseassign']);
 Route::post('/store-course',[AdminController::class, 'course']);
 Route::post('/store-courseassign',[AdminController::class, 'storecourseassign']);
 Route::get('/courselist',[AdminController::class, 'courselist'])->name('course_list');
 Route::get('/courseassignlist',[AdminController::class, 'courseassignlist'])->name('courseassign_list');
 Route::get('/teacherregistration',[TeacherController::class, 'registration']);
 Route::post('/store-teacher',[TeacherController::class, 'storeTeacher']);
 Route::get('/teacherlist',[TeacherController::class, 'teacherlist'])-> name('teacherlist');
 Route::get('adminlogout',[AuthController::class,'adminlogout']);
 Route::get('/department',[AdminController::class, 'department'])->name('department_create');
 Route::post('/store-department',[AdminController::class, 'storedepartment']);
 Route::get('/departmentlist',[AdminController::class, 'departmentlist'])->name('department_list');
 Route::get('/delete-department/{id}',[AdminController::class,'delete']);
});

Route::middleware(['isStudentLogin','isStudent'])->group(function () {
    Route::get('/students',[AuthController::class, 'students']);
    Route::get('/proposal',[StudentController::class, 'proposal']);
    Route::post('/store-proposal',[StudentController::class, 'storeproposal']);
    Route::get('/proposallist',[StudentController::class, 'proposallist']);;
   // Route::get('/studentlogout',[StudentController::class, 'studentlogout']);
    Route::get('/studentlogout',[AuthController::class, 'studentlogout']);

    Route::get('/courselist',[StudentController::class, 'courselist'])->name('course_list');
});

Route::middleware(['isTeacherLogin','isTeacher'])->group(function () {
    //Route::get('/teachers',[TeacherController::class, 'teachers'])
   Route::get('/teachers',[AuthController::class,'teachers']);
    Route::get('/assignproposal/{course_id}',[TeacherController::class, 'assignproposal']);
    Route::get('proposal_accept/{proposal_id}',[TeacherController::class, 'proposalaccept']);
    Route::get('proposal_delete/{proposal_id}',[TeacherController::class, 'proposaldelete']);
    //Route::get('/teacherlogout',[TeacherController::class, 'logout']);
    Route::get('/teacherlogout',[AuthController::class,'teacherlogout']);
    

});
 