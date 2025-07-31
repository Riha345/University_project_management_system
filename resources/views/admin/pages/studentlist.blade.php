@extends('admin.layout.full')
@section('content')

   
    <main class="">
        <div class="container-fluid">
            <h1 class="mt-4">List Student</h1>
                <div style="margin-bottom: 4px">
                    <a href="{{URL::to('registration')}}" class="btn btn-info">Create</a>
                </div>   
        </div>
        
        <div class="card mx-4" >
        <table id="xyz" class="table" >
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Depertment</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Student ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                         <tr>
                            <th >{{ $student->id }}</th>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->student_email}}</td>
                            <td>{{$student->dept_info->dept_name}}</td>
                            <td>{{$student->batch}}</td>
                            <td>{{$student->student_reg_id}}</td>
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
        "aTargets": [] }
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
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            'pageLength'
        ]
    } );
} );
</script>
    
@endsection