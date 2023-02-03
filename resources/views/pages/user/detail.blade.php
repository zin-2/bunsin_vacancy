@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">  <i class="fas fa-users"></i> Users : <strong>{{ $user->name }}</strong> </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
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
        <table class="table">
           
            <tbody>
               
                <tr>
                    <th width="15%">User Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                 <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Professional</th>
                    <td>{{ $user->professional }}</td>
                </tr>
                <tr>
                    <th>Education</th>
                    <td>{{ $user->education }}</td>
                </tr>
                <tr>
                    <th>Job Roles</th>
                    <td>{{ $user->job_roles }}</td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td>{{ $user->experience }}</td>
                </tr>
                <tr>
                    <th>Skills</th>
                     
                    <td>{{ $user->skills }}</td>
                </tr>
                <tr>
                    <th>Languages</th>
                    <td>{{ $user->languages }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $user->gender }}</td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ $user->website }}</td>
                </tr>
                <tr>
                    <th>Bio</th>
                    <td>{{ $user->bio }}</td>
                </tr>
                 <tr>
                    <th>status</th>
                   <td> <span class="badge badge-success">{{ $user->is_active == 0 ? "Active" : "Deactive" }}</span></td>
               </tr>  
            </tbody>
        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection

