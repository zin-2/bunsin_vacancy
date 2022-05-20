@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> Change Password</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <form name="add-category" id="add-blog-post-form" method="POST" action="{{ url('change-password') }}">
           @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Old Password <span class="text-danger">*</span> </label>
                <input type="password" value="" class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" value="{{ old('old_password') }}" name="title" value="{{old('old_password')}}" name="old_password" value="{{old('old_password')}}" name="old_password" placeholder="Enter Old Password">
                <font style="color:red"> {{ $errors->has('old_password') ?  $errors->first('old_password') : '' }} </font>
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">New Password  <span class="text-danger">*</span> </label>
                <input type="password" value="" class="form-control {{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" value="{{ old('new_password') }}" name="new_password" placeholder="Enter  New  Password">
                <font style="color:red"> {{ $errors->has('new_password') ?  $errors->first('new_password') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">New Password Confirmation <span class="text-danger">*</span> </label>
                <input type="password" value="" class="form-control {{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" name="new_password_confirmation" placeholder="Enter New Password">
                <font style="color:red"> {{ $errors->has('new_password_confirmation') ?  $errors->first('new_password_confirmation') : '' }} </font>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

