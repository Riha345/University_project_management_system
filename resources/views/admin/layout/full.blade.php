<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.include.head')
    </head>
    <body class="sb-nav-fixed">
        @include('admin.include.nav')
        <div id="layoutSidenav">
           @include('admin.include.sidenav') 
            <div id="layoutSidenav_content">
                @yield('content') 
               @include('admin.include.footer')   
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
         <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('admin/assets/demo/datatables-demo.js')}}"></script>
        <script src="{{asset('sol.js')}}"></script>
        <link href="{{asset('sol.css')}}" rel="stylesheet">
         @yield('script')
    </body>
</html>
