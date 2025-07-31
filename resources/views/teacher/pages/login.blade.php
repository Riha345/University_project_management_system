@extends('teacher.layout.single')
@section('content')
<div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    @if(session()->has('msg') && session()->get('msg') == 2)
                                        <div class="">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                                <strong>Warning!</strong>Invalid Email or Password.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <form method="post" action="{{ URL::to('store-teacher-login')}}">
                    {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Teacher Code</label>
                                                <input class="form-control py-4" name="teacher_code" type="text" placeholder="Enter Teacher Code" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{URL::to ('registration')}}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
@stop
@section('script')
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('asstes/js/scripts.js')}}"></script>
@endsection