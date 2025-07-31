@extends('admin.layout.full')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Course Assigned</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{URL::to('store-courseassign')}} ">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="small mb-1" for="inputBatch">Couse Name</label>
                                <select class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id}}"> {{ $course->course_name}}  
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="teacher_id">Teacher Name</label>
                                <select  id="teacher_id" name="teacher_id[]" multiple="multiple">
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id}}"> {{ $teacher->teacher_name}} - {{ $teacher->teacher_code}}  
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    
                     <div class="form-group">
                        <label class="small mb-1" for="inputBatch">Depertment</label>
                                <select class="form-control" name="depertment_id">
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

@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        // initialize sol
        $('#teacher_id').searchableOptionList();
    });
</script>
@endsection