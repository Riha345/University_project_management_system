@extends('student.layout.full')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Profile</h3>
            </div>
            <div class="card-body">
              <!--  <p>ID: {{Session::get('student_reg_id') }}</p> -->
              <p>ID: {{Session::get('username') }}</p>
                <p>Role: {{Session::get('userrole')}}</p>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="btn btn-primary" href="{{URL::to('proposal')}}">Submit Your Idea</a>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="btn btn-primary" href="{{URL::to('course_list')}}">View Courselist</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection