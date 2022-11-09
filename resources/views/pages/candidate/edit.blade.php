@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
         

    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Applicant</h3>

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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{ route('employer_applicant_update',[$job->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Vacancy <span class="text-danger">*</span> </label>
                        <select id="vacancy" name="vacancy" class="form-control">
                            <option>-- Please Select Vacancy --</option>
                            @foreach ($all_job as $jobs)
                                <option value="{{$jobs->id}}" {{ ( $jobs->title == $job->job->title ? 'selected' : '')}} > {{$jobs->title}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('vacancy') ?  $errors->first('vacancy') : '' }} </font>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>User <span class="text-danger">*</span> </label>
                        <select id="user_id" name="user_id" class="form-control">
                            <option>-- Please Select User --</option>
                            @foreach ($user as $users)
                                   <option value="{{$users->id}}" {{ ( $users->name == $job->user->name ? 'selected' : '')}} > {{$users->name}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('user_id') ?  $errors->first('user_id') : '' }} </font>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span> </label>
                        <select id="status" name="status" class="form-control">
                            <option>-- Please Select Status --</option>
                            @foreach ($status as $statuses)
                             <option value="{{$statuses}}" {{ ( $statuses == $job->status ? 'selected' : '')}} > {{$statuses}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('status') ?  $errors->first('status') : '' }} </font>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Noted <span class="text-danger">*</span> </label>
                        <textarea name="note" class="form-control" id="" cols="30" rows="5">{{ $job->notes }}</textarea>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Candidate Resume <span class="text-danger">*</span> </label>
                         <input type="file" class="form-control" id="file_name" name="file_name" accept=".doc,.docx,.pdf">
                         <strong><i><a style="color:red;" href="#">{{ $job->resume }}</a></i></strong>
                        <font style="color:red"> {{ $errors->has('file_name') ?  $errors->first('file_name') : '' }} </font>
                    </div>
                </div>
            </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-default" href="{{ url()->previous() }}"> Back</a>
        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Save</button>
    </div>
    <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

