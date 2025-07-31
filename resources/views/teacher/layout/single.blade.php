<!DOCTYPE html>
<html lang="en">
<head>
@include('teacher.include.head')

</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main style="margin-bottom: 18px">
                    <div class="container">
                        @yield('content') 
                        
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            @include('teacher.include.footer')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('teacher/js/scripts.js')}}"></script>
    </body>
</html>