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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('post.update',[$post->id])}}" enctype="multipart/form-data" >
             @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1"> Title </label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter Title">
                <font style="color:red"> {{ $errors->has('title') ?  $errors->first('title') : '' }} </font>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                <textarea name="post_description" id="post_description">{{ $post->description }}</textarea>
                <font style="color:red"> {{ $errors->has('post_description') ?  $errors->first('post_description') : '' }} </font>
            </div>
            <div class="form-group">
                            <label for="exampleInputEmail1">Feature Image <span class="text-danger">*</span></label>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="file_name" placeholder="Choose image" id="file_name">
                                    <font style="color:red"> {{ $errors->has('file_name') ?  $errors->first('file_name') : '' }} </font>
                                </div>
                            </div>
                            <p><img width="100px;" src="{{ asset('resume/'.$post->image) }}" alt="{{ __('') }}"></p>

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

