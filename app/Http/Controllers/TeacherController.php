<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Depertment;
use App\Models\Proposal;
use App\Models\Course_assign;
use Session;
class TeacherController extends Controller
{
   public function teacherlogin(){
        return view('teacher.pages.login');
    }
    public function storeTeacherLogin(Request $req){
        $teacher_code = $req->teacher_code;
        $password = $req->password;
        $teacher = Teacher::where('teacher_code','=',$teacher_code)
               ->where('password','=',$password)
               ->first();
        if($teacher){
           Session::put('teacher_code',$teacher->teacher_code);
           Session::put('userrole',$teacher->role);

           //return redirect()->to('/students', $student_reg_id);
           return redirect()->to('/teachers');
        }
        else{
            return redirect()->back()->with('err_msg','Invalid ID or password');
        }

    }

    public function logout(){
       // Session::forget(['teacher_code','userrole']);
        Session::forget(['username','userrole']);
        return redirect()->to('/login');
    }
    
    public function teachers(){
     // $teacher_code = Session::get('teacher_code');
      $teacher_code = Session::get('username');
      //dd($teacher_code);
      //$course_assigns = Course_assign::();
      $teacher = Teacher::where('teacher_code', $teacher_code)->first();
      //dd($teacher->id);
      $course_assigns = Course_assign::where('teacher_id', $teacher->id)->get();
        return view('teacher.pages.teacher',compact('course_assigns'));

    } 
    public function registration(){
      $depertments= Depertment::where('status',1)->get();
        return view('teacher.pages.registration', compact('depertments'));
    }
    public function storeTeacher(Request $request)
    {
        $teacher = new Teacher();
          
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        
        $teacher->teacher_code = $request->teacher_code;
        $teacher->depertment_id  = $request->depertment_id;
        $teacher->password = $request->password;

        if($teacher->save())
          {
              return redirect()->route('teacherlist');
          }  
    }
    public function teacherlist(){
          //$teachers = new Teacher();
         //$teachers = $teachers->get();
    	$teachers = Teacher::all();
        return view('teacher.pages.teacherlist',compact('teachers'));
    }
      public function assignproposal($course_id){
          //$teachers = new Teacher();
         //$teachers = $teachers->get();
     // $teacher_code = Session::get('teacher_code');
      $teacher_code = Session::get('username');

      //dd($teacher_code);
      //$course_assigns = Course_assign::();
      $teacher = Teacher::where('teacher_code', $teacher_code)->first();
      //$teacher = Teacher::where('teacher_name', $teacher_code)->first();
      //dd($teacher->id);
      $proposals = Proposal::where('teacher_id', $teacher->id)->where('course_id', $course_id)->where('status', 1)->get();
        return view('teacher.pages.assignproposal',compact('proposals'));
    }

    public function proposalaccept($proposal_id){
      $proposal = Proposal::findOrFail($proposal_id);
      $proposal->status = 2;
      $proposal->save();
        return redirect()->to('/teachers');
    }

    public function proposaldelete($proposal_id){
      $proposal = Proposal::findOrFail($proposal_id);
      $proposal->status = 0;
      $proposal->save();
        return redirect()->to('/teachers');
    }
       
}
