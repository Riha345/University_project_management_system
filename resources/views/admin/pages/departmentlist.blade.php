@extends('admin.layout.full')
@section('content')

   
    <main class="">
        <div class="container-fluid">
            <h1 class="mt-4">List Department</h1>
                <div style="margin-bottom: 4px">
                    <a href="{{URL::to('department')}}" class="btn btn-info">Create</a>
                </div>   
        </div>
        
        <div class="card mx-4" >
        <table id="xyz" class="table" >
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">department Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($department as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{$department->dept_name}}</td>
                            <td>
                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$department->id}}">Delete</a>
                             <!-- The Modal -->
                                    <div class="modal" id="myModal{{$department->id}}">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Delete Confirmation</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            Are you sure you want to delete <b>{{$department->dept_name}}</b>?
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <a href="{{url('/delete-department/'.$department->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(Session::has('msg'))
    <div class="alert alert-danger">
        <strong>{{Session::get('msg')}}</strong>
    </div>
    @endif
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
        "aTargets": [ ] }
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
                    columns: [0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            'pageLength'
        ]
    } );
} );
</script>
    
@endsection