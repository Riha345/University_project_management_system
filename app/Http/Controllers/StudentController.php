<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Depertment;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Proposal;
use App\Models\Assignby;
use Illuminate\Http\Request;
use Session;
class StudentController extends Controller
{
   public function studentlogin(){
        return view('student.pages.login');
    }
    public function storeStudentLogin(Request $req){
        $student_reg_id = $req->student_reg_id;
        $password = $req->password;
        $student = Student::where('student_reg_id','=',$student_reg_id)
               ->where('password','=',$password)
               ->first();
        if($student){
           Session::put('student_reg_id',$student->student_reg_id);
           Session::put('userrole',$student->role);

          //return redirect()->to('/students', $student_reg_id);
           return redirect()->to('/students');
        }
        else{
            return redirect()->back()->with('err_msg','Invalid ID or password');
        }

    }

    public function studentlogout(){
        Session::forget(['student_reg_id','userrole']);
        return redirect()->to('/studentlogin');
        //return view('student.pages.login');
    }
    public function students(){

        return view('student.pages.student');
    }

    public function registration(){
        $depertments= Depertment::where('status',1)->get();
        return view('student.pages.registration', compact('depertments'));
    }
    public function storeStudent(Request $request)
    {
        $student = new Student();
          
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->depertment_id = $request->depertment_id;
        $student->batch = $request->batch;
       
        $student->student_reg_id = $request->student_id;
        $student->password = $request->password;

        if($student->save())
          {
              return redirect()->route('student_list');
          }  
    }
    public function studentlist(){
          $students = new Student();
         $students = $students->get();
        return view('admin.pages.studentlist',[
            'students' => $students,
         ]);
    }
    public function proposal(){
       //$student_reg_id = Session::get('student_reg_id');
       $student_reg_id = Session::get('username');
      //dd($teacher_code);
      //$course_assigns = Course_assign::();
      //$student = Student::where('student_reg_id', $student_reg_id)->first();
      $student = Student::where('student_reg_id', $student_reg_id)->first();
      $own_id = $student->id;

      $courses= Course::where('status',1)->get();
      $teachers= Teacher::where('status',1)->get();
      $students= Student::where('status',1)->where('id','!=', $own_id)->get();
        return view('student.pages.proposal', compact('courses','teachers', 'students', 'own_id'));
    }
    public function storeproposal(Request $request)
    {

      $group_members = $request->groupmember;
      
        $proposal = new Proposal();
          
        $proposal->course_id = $request->course_id;
        $proposal->teacher_id = $request->teacher_id;
        $proposal->title = $request->title;
        $proposal->descriptipn = $request->descriptipn;
        if($proposal->save())
          {
            $last_id = $proposal->id;
            foreach ($group_members as $group_member) {
              $assignbies = new Assignby();
              $assignbies->proposal_id = $last_id;
              $assignbies->student_id = $group_member;
              $assignbies->save();
            }
              $assignbies = new Assignby();
              $assignbies->proposal_id = $last_id;
              $assignbies->student_id = $request->own_id;
              $assignbies->save();
              return redirect()->to('proposallist');
          }
      }
      public function proposallist(){
     // $student_reg_id = Session::get('student_reg_id');
     $student_reg_id = Session::get('username');
      $student = Student::where('student_reg_id', $student_reg_id)->first();
      $assigns = Assignby::where('student_id', $student->id)->get();
        return view('student.pages.proposallist', compact('assigns'));
      }

      public function courselist()
      {
          $courses = new Course();
          $courses = $courses->get();
          return view('admin.pages.courselist',[
              'courses' => $courses,
           ]);
      }
  
  
}
