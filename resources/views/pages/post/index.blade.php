@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">POST</h3>

        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('company.create') }}"><i class="fas fa-plus-circle"></i>
                        Add New Post</a>
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
        <table id="tbl_post" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Thumb</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($post as $key => $posts )
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$posts->title}}</td>
                    <td> <img width="50px" src="{{ asset('resume/'.$posts->image) }}" alt="{{ __('') }}"> </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">Action</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a name="edit" class="dropdown-item" href="{{url('post/'.$posts->id.'/edit')}}">Edit</a>
                                <a onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$posts->id }}').submit();" class="dropdown-item" href="{{ route('category.destroy',[$posts->id]) }}">Delete</a>
                                <form id="delete-form-{{ $posts->id }}" action="{{ route('category.destroy',[$posts->id]) }}" method="POST" style="display: none;">
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
            $("#tbl_post").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#tbl_post_wrapper .col-md-6:eq(0)');
        </script>
    @endsection
