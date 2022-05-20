@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Company : <strong>{{ $company->company_name }} </strong> </h3>
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
                    <th width="15%">company name</th>
                    <td>{{ $company->company_name }}</td>
                </tr>
                 <tr>
                    <th>industry</th>
                    <td>{{ $company->industry }}</td>
                </tr>
                 <tr>
                    <th>Description</th>
                    <td>{!! $company->description !!}</td>
                </tr>
            
                 <tr>
                    <th>Company Logo</th>
                    <td><img class="img-thumbnail" width="50px;" src="{{ asset('images/'.$company->company_logo) }}"></td>
                </tr>
                  <tr>
                    <th>Status</th>
                  <td class="project-state">
                       <span class="badge badge-success">{{ $company->is_active === 1 ? "Active" : "Inactive" }}</span>
                  </td>
                </tr>
              
            </tbody>
        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection

