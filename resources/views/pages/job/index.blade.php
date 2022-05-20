@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Job Posting</h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('job.create') }}"><i class="fas fa-plus-circle"></i>
                        Add New Job</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="card-body">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ session()->get('message') }}
        </div>
        @endif

        <table id="example1" style="width:100%" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Position</th>
                    <th>Type</th>
                    <th>Closing Date</th>
                    <th>Location</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($job as $key => $jobs)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><a href="{{ route('job.show',[$jobs->id])}}">{{ $jobs->title }}</a> </td>
                    <td>{{ $jobs->category->name }}</td>
                    <td>{{ $jobs->exp_level }}</td>
                    <td>{{ $jobs->job_type }}</td>
                    <td>{{ date('d-m-Y', strtotime($jobs->closing_date)) }}</td>
                    <td>{{ $jobs->province->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($jobs->created_at)) }}</td>
                    <td><span class="badge bg-success">{{ $jobs->status == 1 ? "Deactive" : "Active" }} </span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">Action</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a name="edit" class="dropdown-item" href="{{url('job/'.$jobs->id.'/edit')}}">Edit</a>
                                <a onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$jobs->id }}').submit();" class="dropdown-item" href="{{ route('job.destroy',[$jobs->id]) }}">Delete</a>
                                <form id="delete-form-{{ $jobs->id }}" action="{{ route('job.destroy',[$jobs->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection

    @section('scripts')
        <script type="text/javascript">
            $("#example1").DataTable({
                scrollX: true,
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
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 ]
                        }
                    },
                    'colvis'
                ]
              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        </script>
    @endsection

