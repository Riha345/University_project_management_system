<!DOCTYPE html>
<html lang="en">
    <head>
        @include('teacher.include.head')
    </head>
    <body class="sb-nav-fixed">
        @include('teacher.include.nav')
        <div id="layoutSidenav">
           @include('teacher.include.sidenav') 
            <div id="layoutSidenav_content">
                @yield('content') 
               @include('teacher.include.footer')   
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('teacher/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('teacher/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('teacher/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('teacher/assets/demo/datatables-demo.js')}}"></script>
    </body>
</html>
