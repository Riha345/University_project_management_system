@extends('teacher.layout.full')
@section('content')

   
    <main class="">
        <div class="container-fluid">
            <h1 class="mt-4">List Proposals</h1>
                  
        </div>
        
        <div class="card mx-4" >
        <table id="xyz" class="table" >
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($proposals as $proposal)
                         <tr>
                            <td>{{$proposal->course_info->course_name}}</td>
                            <td>{{$proposal->title}}</td>
                            <td>{{$proposal->descriptipn}}</td>
                            <td>
                                <a href="{{URL::to('proposal_accept/'.$proposal->id)}}" class="btn btn-success">Accept</a>
                                <a href="{{URL::to('proposal_delete/'.$proposal->id)}}" class="btn btn-danger">Delete</a>
                            </td>
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