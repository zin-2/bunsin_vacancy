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
    <div class="card-body">
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('category.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" value="{{ old('category_name') }}" name="title" value="{{old('category_name')}}" name="category_name" value="{{old('category_name')}}" placeholder="Enter Category Name">
                @if ($errors->has('category_name'))
                     <span class="text-danger">{{ $errors->first('category_name') }}</span>
                @endif
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

