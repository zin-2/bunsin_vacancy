@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">


    <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fas fa-info"></i> Company Info</h3>

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

        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('company.update',[$company->id])}}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="exampleInputEmail1"> Name</label>
                <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}" placeholder="Enter Company">
                <font style="color:red"> {{ $errors->has('company_name') ?  $errors->first('company_name') : '' }} </font>
            </div>
            <div class="form-group">
                <label>Industry</label>

                <select name="industry" class="form-control">
                    <option value="">-- Select Industry --</option>
                    @php
                        $industry = array("Manufacturing","Architecture & Design","Electrical Supply","Construction","Accounting/Taxation/Auditing");
                    @endphp
                    @foreach ($industry as $industries)
                        <option value="{{$industries}}" {{ ( $industries == $company->industry ? 'selected' : '')}} > {{$industries}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                <textarea name="description" id="companyDescription">{{ $company->description }}</textarea>
                <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
            </div>
            <div class="row">
                <label for="exampleInputEmail1">Company Logo <span class="text-danger">*</span></label>
                <div class="col-md-12 mb-2">
                    <img id="image_preview_container" src="{{ asset('images/'.$company->company_logo) }}" alt="preview image" style="max-height: 150px;">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="file" name="company_logo" placeholder="Choose image" id="image">
                        <font style="color:red"> {{ $errors->has('company_logo') ?  $errors->first('company_logo') : '' }} </font>
                    </div>
                </div>

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

@section('scripts')
<script>
    $('#companyDescription').summernote({
        placeholder: 'Company Description'
        , tabsize: 2
        , height: 200
        , toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']]
            , ['para', ['ul', 'ol', 'paragraph']]
        , ]
    });


</script>
@endsection

