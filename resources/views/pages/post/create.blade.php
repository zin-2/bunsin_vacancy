@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">


    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Post</h3>

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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('post.store')}}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"> Title </label>
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" name="title" value="{{old('title')}}" placeholder="Enter Title">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                <textarea class="form-control {{ $errors->has('post_description') ? ' is-invalid' : '' }}" name="post_description" value="{{ old('post_description') }}" name="post_description" value="{{old('post_description')}} " name="post_description" id="post_description"></textarea>
                @if ($errors->has('post_description'))
                     <span class="text-danger">{{ $errors->first('post_description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Feature Image <span class="text-danger">*</span></label>

                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control {{ $errors->has('file_name') ? ' is-invalid' : '' }}" name="file_name" value="{{ old('file_name') }}" name="file_name" value="{{old('file_name')}}" type="file" name="file_name" placeholder="Choose image"
                            id="file_name">
                            @if ($errors->has('file_name'))
                            <span class="text-danger">{{ $errors->first('file_name') }}</span>
                        @endif
                    </div>
                </div>

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
