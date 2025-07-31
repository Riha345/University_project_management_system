<!DOCTYPE html>
<html lang="en">
    <head>
        @include('student.include.head')
    </head>
    <body class="sb-nav-fixed">
        @include('student.include.nav')
        <div id="layoutSidenav">
           @include('student.include.sidenav') 
            <div id="layoutSidenav_content">
                @yield('content') 
               @include('student.include.footer')   
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('student/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('student/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('student/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('student/assets/demo/datatables-demo.js')}}"></script>
        <script src="{{asset('sol.js')}}"></script>
        <link href="{{asset('sol.css')}}" rel="stylesheet">
         @yield('script')
    </body>
</html>
