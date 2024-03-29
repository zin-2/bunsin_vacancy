@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> <i class="nav-icon fas fa-user"></i> Users</h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('user.create') }}"><i class="fas fa-plus-circle"></i> Create New Users</a>
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
        @if(session()->has('message_update'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ session()->get('message_update') }}
        </div>
        @endif


        <table id="tbl_user" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $users )
                <tr>
                    <td>{{$key+1}}</td>
                    <td><a href="{{ route('user.show',[$users->id]) }}"> {{$users->name}}</a></td>
                    <td>{{$users->email}}</td>
                    <td>
                        <span class="badge badge-success">{{ $users->is_active == 0 ? "Active" : "Inactive" }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">Action</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a name="edit" class="dropdown-item" href="{{url('user/'.$users->id.'/edit')}}">Edit</a>
                                <a onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$users->id }}').submit();" class="dropdown-item" href="{{ route('user.destroy',[$users->id]) }}">Delete</a>
                                <form id="delete-form-{{ $users->id }}" action="{{ route('user.destroy',[$users->id]) }}" method="POST" style="display: none;">
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
        $("#tbl_user").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#tbl_user_wrapper .col-md-6:eq(0)');
    </script>
@endsection
