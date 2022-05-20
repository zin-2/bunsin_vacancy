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
    <form name="add-category" id="add-blog-post-form" method="POST" action="{{route('user.update',$user->id)}}">
      @csrf
            @method('patch')
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input required type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Enter User">
             <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input required type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Enter Email">
             <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
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

