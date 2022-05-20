@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Applicant</h3>
        @if(Auth::user()->is_admin == 1)
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('employer_applicant_create') }}"><i class="fas fa-plus-circle"></i> Add Candiate</a>
                </li>

            </ul>
        </div>
        @endif
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

        <table id="tbl_candidate" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Vacancy</th>
                    <th>Date Apply</th>
                    <th>Status</th>
                    <th>Resume</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicant as $key => $applicants )
                <tr>
                    <td>{{$key+1}}</td>
                    <td><a  href="{{ route('employer_applicant_detail',[$applicants->id,$applicants->user->id,$applicants->job->id]) }}">{{$applicants->user->name}}</a> </td>
                    <td>{{$applicants->job->title}}</td>
                    <td>{{ date('d-m-Y', strtotime($applicants->applies_date))  }}</td>
                    <td>
                        @if($applicants->status == "pending")
                                <span class="badge badge-warning">{{ $applicants->status }}</span>
                        @elseif($applicants->status == "reject")
                             <span class="badge badge-danger">{{ $applicants->status }}</span>
                        @elseif($applicants->status == "shortlist")
                             <span class="badge badge-info">{{ $applicants->status }}</span>
                        @elseif($applicants->status == "interview")
                                    <span class="badge badge-success">{{ $applicants->status }}</span>
                        @endif
                    </td>
                    <td><a  target="_blank"  href="{{ asset('resume/'.$applicants->resume) }}">{{ $applicants->resume }}</a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">Action</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                @if(Auth::user()->is_admin == "1" || Auth::user()->is_admin == "0")
                                     <a name="edit" class="dropdown-item" href="{{ route('employer_applicant_edit',[$applicants->id]) }}">Edit</a>
                                @endif
                                <a onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$applicants->id }}').submit();" class="dropdown-item" href="{{ route('category.destroy',[$applicants->id]) }}">Delete</a>
                                <form id="delete-form-{{ $applicants->id }}" action="{{ route('category.destroy',[$applicants->id]) }}" method="POST" style="display: none;">
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
            $("#tbl_candidate").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#tbl_candidate_wrapper .col-md-6:eq(0)');
        </script>
    @endsection
