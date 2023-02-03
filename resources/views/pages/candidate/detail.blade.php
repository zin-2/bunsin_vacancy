@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
    <h4 class="card-title">Candidate List</h4>
    <button type="submit" class="btn bg-success float-right">
        <i class="fa fa-save"></i> Save
    </button>
    </div>
    </div>
<div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Candidate Details : <strong>{{ $job->user->name }} </strong> </h3>
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
            <div class="col-sm-12">
                <div class="form-group {{ $errors->has('idCompany') ? 'has-error' : ''}}">
                    <label for="Return_Type">Candiate Status <span class="text-danger">*</span></label>
                    <select name="idCompany" id="Return_Type" class="form-control">
                        @php
                            $status = array("pending","reject","shortlist","interview");
                        @endphp
                        @foreach ($status as $value)
                            <option value="{{$value}}" {{ ( $value == $job->status ? 'selected' : '')}} > {{$value}} </option>
                        @endforeach
                        </select>
                    @if ($errors->has('idCompany'))
                    <span class="text-danger">{{ $errors->first('idCompany') }}</span>
                    @endif
                </div>
            </div>
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
                    <th>Notes</th>
                    <td>
                        {{ $job->notes }}
                    </td>
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
</div>
    <!-- /.card -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fab fa-cat-space"></i>Candidate Profile Details : <b>{{ $job->user->name }} </b> </h3>
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
                                <th width="15%">Candiate Name : </th>
                                <td><strong>{{ $job->user->name }}</strong></td>
                            </tr>   
                              <tr>
                                <th>Email</th>
                                <td>
                                    {{ $job->user->email}}
                                </td>
                            </tr>      
                            <tr>
                                <th width="15%">Date of Birth : </th>
                                <td>{{ $job->user->birth_date}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Gender : </th>
                                <td>{{ $job->user->gender}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Status : </th>
                                <td>{{ $job->user->marital_status}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Professional : </th>
                                <td>{{ $job->user->professional}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Skills : </th>
                                <td> {{ preg_replace('/[^A-Za-z0-9\-]/', ' ',$job->user->skills) }}</td>
                            </tr>
                            <tr>
                                <th width="15%">Lanugages : </th>
                                <td>{{ preg_replace('/[^A-Za-z0-9\-]/', ' ',$job->user->languages) }}</td>  
                            </tr>
                            <tr>
                                <th width="15%">Professional : </th>
                                <td>{{ $job->user->experience." Years"}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Job Role : </th>
                                <td>{{ $job->user->job_roles}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Education : </th>
                                <td>{{ $job->user->education}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Website : </th>
                                <td>{{ $job->user->website}}</td>
                            </tr>
                            <tr>
                                <th width="15%">Bio : </th>
                                <td>{!! $job->user->bio !!}</td>
                            </tr>
                            <tr>
                                <th width="15%">Register Date : </th>
                                <td>{{ $job->user->created_at }}</td>
                            </tr>
                             
                            </tr>
                          
                        </tbody>
                    </table>
                    
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
</div>
</div>
    @endsection

