@extends('teacher.layout.full')
@section('content')

   
    <main class="">
        <div class="container-fluid">
            <h1 class="mt-4">List Course Assigned</h1>
                   
        </div>
        
        <div class="card mx-4" >
        <table id="xyz" class="table" >
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Teacher Code</th>
                                                    
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($course_assigns as $course)
                         <tr>
                            <th >{{ $course->id }}</th>
                            <td>{{$course->course_info->course_name}}</td>
                            <td>{{$course->teacher_info->teacher_name}}</td>
                            <td> <a href="{{URL::to('assignproposal/'.$course->course_id)}}" class="btn btn-info">Details</a></td>
                        </tr>
                    @endforeach
                      
                    </tbody>
                </table>
        </div>
    </main>
    
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script>
    $(document).ready(function() {
    $('#xyz').DataTable( {
        
        "aoColumnDefs": [
        { "bSortable": false, 
        "aTargets": [3] }
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2]
                }
            },
            'pageLength'
        ]
    } );
} );
</script>
    
@endsection