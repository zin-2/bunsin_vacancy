@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Job : <strong>{{ $job->title }}</strong> </h3>
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
                    <th width="15%">Company</th>
                    <td>{{ $job->company->company_name }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $job->title }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $job->gender }}</td>
                </tr>
                <tr>
                    <th>Experience Level </th>
                    <td>{{ $job->exp_level }}</td>
                </tr>
                <tr>
                    <th>is Ugent</th>
                    <td> <span class="badge badge-success"> {{ ($job->is_urgent == 1 ? 'Yes' : 'No')}} </span></td>
                </tr>
                <tr>
                    <th>Experience Required </th>
                    <td>{{ $job->experience_required_years }}</td>
                </tr>
                 <tr>
                    <th>Salary Range</th>
                    <td>{{ $job->salary.' - '.$job->salary_upto.' USD / '.ucfirst($job->salary_cycle) }}</td>
                </tr>
                 <tr>
                    <th>Closing Date</th>
                    <td>{{ $job->closing_date }}</td>
                </tr>
                 <tr>
                    <th>Location</th>
                    <td>{{ $job->province->name.' - '.$job->district->name }}</td>
                </tr>
                <tr>
                    <th>Contact Person</th>
                    <td>{{ $job->company->first_name .''.$job->company->last_name}}</td>
                </tr>
                <tr>
                    <th>Industry</th>
                    <td>{{ $job->category->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $job->description !!}</td>
                </tr>
                 <tr>
                    <th>Requirement</th>
                    <td>{!! $job->requirement !!}</td>
                </tr>
                  <tr>
                    <th>Status</th>
                  <td class="project-state">
                      <span class="badge badge-success">{{ $job->is_active === 1 ? "Active" : "Inactive" }}</span>
                  </td>
                </tr>
              
            </tbody>
        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection

