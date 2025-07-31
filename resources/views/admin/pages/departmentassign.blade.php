@extends('admin.layout.full')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
                <h3 class="text-center font-weight-light my-4">ADD Department</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{URL::to('store-department')}} ">
                    {{ csrf_field() }}
   
                    <div class="form-group">
                        <label class="small mb-1" for="inputName">Deparment Name</label>
                        <input class="form-control py-4" name="dept_name" type="text" placeholder="Enter Department name" />
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