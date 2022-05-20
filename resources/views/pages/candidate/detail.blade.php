@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Candidate Details : <strong>{{ $job->user->name }} </strong> </h3>
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
                    <th width="15%">Apply For  : </th>
                    <td><strong>{{ $job->job->title }}</strong></td>
                </tr>   
                  <tr>
                    <th>Company</th>
                    <td>
                            {{ $Company->company_name }}
                    </td>
                </tr>      
                <tr>
                    <th width="15%">Date Applies : </th>
                    <td>{{ date('d-m-Y', strtotime($job->applies_date))  }}</td>
                </tr>
                 <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge badge-success">{{ $job->status }}</span>
                    </td>
                </tr> 

                 <tr>
                    <th>Resume</th>
                    <td>
                        <a _target="blank" href="{{ asset('resume/'.$job->resume) }}"><span class="badge badge-success">{{ $job->resume}} </a> </span>
                    </td>
                </tr> 
                
                  {{-- <tr>
                    <th>Status</th>
                  <td class="project-state">
                       <span class="badge badge-success">{{ $company->is_active === 1 ? "Active" : "Inactive" }}</span>
                  </td> --}}
                </tr>
              
            </tbody>
        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection

