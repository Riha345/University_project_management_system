<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Depertment;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Course_assign;
use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
   public function adminlogin(){
    
        return view('admin.pages.login');
    }
    public function storeLogin(Request $req){
        $username = $req->username;
        $password = $req->password;
        $admin = Admin::where('username','=',$username)
               ->where('password','=',$password)
               ->first();
        if($admin){
           Session::put('username',$admin->username);
           Session::put('userrole',$admin->role);

           return redirect()->to('/home');
        }
        else{
            return redirect()->back()->with('err_msg','Invalid username or password');
        }

    }

    public function logout(){
        Session::forget(['username','userrole']);
        //return redirect()->to('/adminlogin');
        return view('admin.pages.login');
    }

    public function index(){
        return view('admin.pages.home');
    }

    public function create(){
      $depertments= Depertment::where('status',1)->get();
        return view('admin.pages.course', compact('depertments'));
    }
    public function course(Request $request)
    {
        $course = new Course();
          
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->depertment_id = $request->depertment_id;

        if($course->save())
          {
              return redirect()->route('course_list'); 
          }  
    }
    public function courselist()
    {
        $courses = new Course();
        $courses = $courses->get();
        return view('admin.pages.courselist',[
            'courses' => $courses,
         ]);
    }

     public function department(){
      $depertments= Depertment::where('status',1)->get();
        return view('admin.pages.departmentassign', compact('depertments'));
       
    }
    public function storedepartment(Request $request)
    {
        $department = new Depertment();
          
        $department->dept_name = $request->dept_name;
        

        if($department->save())
          {
              return redirect()->route('department_list'); 
          }  
    }
    public function departmentlist()
    {
        $department = new Depertment();
        $department = $department->get();
        return view('admin.pages.departmentlist',[
            'department' => $department,
         ]);
    }
    public function delete($id){
        $res=Depertment::where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Successfully Deleted');
        }
     public function courseassign(){
      $depertments= Depertment::where('status',1)->get();
      $courses= Course::where('status',1)->get();
      $teachers= Teacher::where('status',1)->get();

        return view('admin.pages.courseassign', compact('depertments','courses','teachers'));
    }
    public function storecourseassign(Request $request)
    {
      $teachers = $request->teacher_id;
      //dd($teachers);
      foreach ($teachers as $teacher) {
        $course_assign = new Course_assign();
          
        $course_assign->course_id = $request->course_id;
        $course_assign->teacher_id = $teacher;
        $course_assign->depertment_id = $request->depertment_id;
        $course_assign->save();
      

      }
        
      return redirect()->route('courseassign_list');  
    }
        public function courseassignlist()
    {
      $course_assigns = Course_assign::all();
        return view('admin.pages.courseassignlist',compact('course_assigns'));
    }



}
