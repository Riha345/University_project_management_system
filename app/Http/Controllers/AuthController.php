<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Depertment;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Course_assign;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function login(){
    
        return view('login');
    }
    public function storeLogin(Request $req){
        $username = $req->username;
        $password = $req->password;
        $admin =Admin::where('username','=',$username)
               ->where('password','=',$password)
               ->first();
        $user= Student::where('student_reg_id','=',$username)
               ->where('password','=',$password)
               ->first();  
         $teacher= Teacher::where('teacher_code','=',$username)
               ->where('password','=',$password)
               ->first();  
               
        if($admin){
           Session::put('username',$admin->username);
           Session::put('userrole',$admin->role);
           return redirect()->to('/home'); 
        }
        else if($user){
            Session::put('username',$user->student_reg_id);
            Session::put('userrole',$user->role);
            return redirect()->to('/students'); 
         }
        else if($teacher){
            Session::put('username',$teacher->teacher_code);
            Session::put('userrole',$teacher->role);
            return redirect()->to('/teachers'); 
         }
        else{
            return redirect()->back()->with('err_msg','Invalid username or password');
        }
    }
    public function index()
    {
        return view('admin.pages.home');
    }
    public function students(){

        return view('student.pages.student');
    }
    public function teachers()
    {
        $teacher_code = Session::get('username');
      //dd($teacher_code);
      //$course_assigns = Course_assign::();
      $teacher = Teacher::where('teacher_code', $teacher_code)->first();
      //dd($teacher->id);
      $course_assigns = Course_assign::where('teacher_id','=', $teacher->id)->get();

        return view('teacher.pages.teacher',compact('course_assigns'));
    }
   public function adminlogout(Request $req)
   {
      $req->session()->forget(['username','userrole']);
      return redirect('login');
   }
   public function studentlogout(Request $req){
    $req->session()->forget(['username','userrole']);
      return redirect('login');
   }
   public function teacherlogout(Request $request){
    //Session::forget(['username','userrole']);
   // return redirect()->to('/login');
   $request->session()->forget(['username','userrole']);
    // return redirect('login');
     return redirect()->to('/login');  

   }
}
