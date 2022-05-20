@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Pricing</h3>

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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('pricing.update',[$pricing->id])}}">
            @csrf
              @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1">Package Name</label>
                <input type="text" class="form-control" name="package_name" value="{{ $pricing->package_name }}" placeholder="Enter Package Name">
                <font style="color:red"> {{ $errors->has('package_name') ?  $errors->first('package_name') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $pricing->price }}" placeholder="Enter Price">
                <font style="color:red"> {{ $errors->has('price') ?  $errors->first('price') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Premium Job</label>
                <input type="number" class="form-control" name="premium_job" value="{{ $pricing->preminum_job }}" placeholder="Enter Premium Job">
                <font style="color:red"> {{ $errors->has('premium_job') ?  $errors->first('premium_job') : '' }} </font>
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

