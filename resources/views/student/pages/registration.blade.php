@extends('student.layout.single')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Create Account</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{URL::to('store-student')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="small mb-1" for="inputName">Name</label>
                        <input class="form-control " name="student_name" type="text" placeholder="Enter name" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control " name="student_email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBatch">Depertment</label>
                                <select class="form-control" name="depertment_id">
                                    @foreach($depertments as $depertment)
                                    <option value="{{ $depertment->id}}"> {{ $depertment->dept_name}}  
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBatch">Batch</label>
                                <input class="form-control " name="batch" type="text" placeholder="Enter batch" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputStudentid">Student ID</label>
                        <input class="form-control " name="student_id" type="text" placeholder="Enter ID" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control " name="password" type="password" placeholder="Enter password" />
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <!-- <a class="btn btn-primary btn-block" href="{{URL::to('/')}}">Create Account</a> -->
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small">
                    <a href="{{URL::to('/')}}">Have an account? Go to login</a>
                </div>
            </div>
        </div>

    </div>
</div>

@stop