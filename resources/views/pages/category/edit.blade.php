@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Category</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <form name="add-category" id="add-blog-post-form" method="POST" action="{{route('category.update',$Category->id)}}">
      @csrf
            @method('patch')
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input required type="text" value="{{$Category->name}}" class="form-control" name="category_name" placeholder="Enter Category">
             <font style="color:red"> {{ $errors->has('category_name') ?  $errors->first('category_name') : '' }} </font>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
             <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
        </div>
        <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

