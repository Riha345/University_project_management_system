@extends('student.layout.full')
@section('content')

   
    <main class="">
        <div class="container-fluid">
            <h1 class="mt-4">List Proposals</h1>  
        </div>
        
        <div class="card mx-4" >
        <table id="xyz" class="table" >
                    <thead>
                        <tr>
                            <th scope="col">Course Name</th>
                           
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($assigns as $assign)
                    @if($assign->proposal_info->status == 1)
                         <tr>
                            <td>{{ $assign->proposal_info->course_info->course_name }}</td>
                            <td>{{ $assign->proposal_info->descriptipn }}</td>
                            <td class="badge badge-secondary">Pending</td>
                        </tr>
                    @elseif($assign->proposal_info->status == 2)
                        <tr>
                            <td>{{ $assign->proposal_info->course_info->course_name }}</td>
                            
                            <td>{{ $assign->proposal_info->descriptipn }}</td>
                            <td class="badge badge-success">Accepted</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $assign->proposal_info->course_info->course_name }}</td>
                           
                            <td>{{ $assign->proposal_info->descriptipn }}</td>
                            <td class="badge badge-danger">Deleted</td>
                        </tr>
                    @endif
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
        "aTargets": [6,7] }
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