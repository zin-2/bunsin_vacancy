@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> user</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <form name="add-category" id="add-blog-post-form" method="POST" action="{{route('user.store')}}">
      @csrf
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input  type="text" value="" class="form-control" name="name" placeholder="Enter Name">
             <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input  type="email" value="" class="form-control" name="email" placeholder="Enter Email">
             <font style="color:red"> {{ $errors->has('email') ?  $errors->first('email') : '' }} </font>
            </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input  type="password" value="" class="form-control" name="password" placeholder="Enter Password">
             <font style="color:red"> {{ $errors->has('password') ?  $errors->first('password') : '' }} </font>
            </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input  type="password" value="" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
             <font style="color:red"> {{ $errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '' }} </font>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
             <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
        </div>
        <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

