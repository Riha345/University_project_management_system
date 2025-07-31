@extends('admin.layout.single')
@section('content')
    @if(session()->has('msg') && session()->get('msg') == 1)
        <div class="d-flex justify-content-end">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 30%; padding: 34px;font-size: large;">
                <strong>Success!</strong>Data insert Successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if(session()->has('msg') && session()->get('msg') == 2)
        <div class="d-flex justify-content-end">
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 30%; padding: 34px;font-size: large;">
                <strong>Warning!</strong>Data insert failed.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
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
                        <input class="form-control py-4" name="name" type="text" placeholder="Enter name" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputDepertment">Depertment</label>
                                <input class="form-control py-4" name="depertment" type="text" placeholder="Enter depertment" />
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBatch">Batch</label>
                                <input class="form-control py-4" name="batch" type="text" placeholder="Enter batch" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputStudentid">Student ID</label>
                        <input class="form-control py-4" name="studentid" type="text" placeholder="Enter ID" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" name="password" type="password" placeholder="Enter password" />
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