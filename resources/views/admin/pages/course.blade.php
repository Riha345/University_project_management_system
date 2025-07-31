@extends('admin.layout.single')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">ADD Course</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{URL::to('store-course')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="small mb-1" for="inputName">Course Name</label>
                        <input class="form-control py-4" name="course_name" type="text" placeholder="Enter course name" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Course Code</label>
                        <input class="form-control py-4" name="course_code" type="text"  placeholder="Enter course code" />
                    </div>
                    <div class="form-group">
                                <label class="small mb-1" for="">Depertment</label>
                                <select class="form-control" name="depertment_id">
                                    <option value="" selected disabled> Select Department 
                                    </option>
                                    @foreach($depertments as $depertment)
                                    <option value="{{ $depertment->id}}"> {{ $depertment->dept_name}}  
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <!-- <a class="btn btn-primary btn-block" href="{{URL::to('/')}}">Create Account</a> -->
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@stop