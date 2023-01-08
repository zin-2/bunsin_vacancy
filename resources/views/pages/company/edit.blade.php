@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])



@section('content')

<form name="add-category" id="add-blog-post-form" method="post" action="{{route('company.update',[$company->id])}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Create Job</h4>
        <button type="submit" class="btn bg-success float-right">
            <i class="fa fa-save"></i> Save
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-info"></i> Company Info <span
                        class="text-danger">*</span> </h3>

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
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $company->company_name }}" class="form-control" name="company_name" id="companyName"
                                        placeholder="Enter Company">
                                    <font style="color:red"> {{ $errors->has('company_name') ?
                                        $errors->first('company_name') :
                                        '' }} </font>
                                </div>
                                <div class="form-group">
                                    <label>Industry <span class="text-danger">*</span></label>

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
                                    <label for="exampleInputEmail1">Bio & Vision<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="description"
                                        id="companyDescription">{{ $company->description }}</textarea>
                                    <font style="color:red"> {{ $errors->has('description') ?
                                        $errors->first('description') : ''
                                        }} </font>
                                </div>
                            </div>
                        </div>

                    </div>


            </div>


           

        </div>

        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-info"></i> Images</h3>
            </div>
            <div class="card-body">
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-12">
                                <div style="display: flex;">
                                    @if($company->company_logo)
                                    <div>
                                        <img class="imgPreview img" src="{{ asset('images/'.$company->company_logo) }}" alt="preview image"  width="150">
                                    </div>
                                    @else
                                    <div>
                                        <img class="imgPreview img" width="150" src="https://via.placeholder.com/80">
                                    </div>
                                    @endif
                                    <div style="margin-left: 15px; flex-grow: 1">
                                        <p>Choose a file </p>
                                        <input id="photo" name="photo" type="file">
                                        <font style="color:red"> {{ $errors->has('photo]') ? $errors->first('photo') : '' }} </font>
                                        <hr />
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuemin="0"
                                                aria-valuemax="100"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Compay Address<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" rows="2" name="primaryAddress"
                                id="primaryAddress">{{ $company->primary_address }}</textarea>
                            <font style="color:red"> {{ $errors->has('description') ?
                                $errors->first('description') : ''
                                }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>latitude <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="lat" value="{{ $company->lat }}" placeholder="Enter latitude">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>longitude <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="long" value="{{ $company->long }}" placeholder="Enter longitude">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-info"></i> Profile Details</h3>

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
                <div class="row">
                    <div class="col-sm-12">
                        <label>Title <span class="text-danger">*</span></label>
                        @php
                        $title = array("Mrs.","Miss","Ms");
                        @endphp
                        <select name="title" class="form-control">
                            <option value="">-- Select Title --</option>
                            @foreach ($title as $titles)
                            <option value="{{$titles}}" {{ ( $titles == $company->title ? 'selected' : '')}} > {{$titles}} </option>
                            @endforeach
                        </select>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span> </label>
                            <input value="{{ $company->first_name }}" type="text" class="form-control" name="first_name" value=""
                                placeholder="Enter Title">

                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="last_name" value="{{ $company->last_name }}" placeholder="Enter Title">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" id="primaryEmail">
                            <label>Primary Email <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="primary_email" value="{{ $company->primary_email }}"
                                placeholder="Enter Title">

                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Primary Phone <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="primary_phone" value="{{ $company->primary_phone }}"
                                placeholder="Enter Title">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" id="secondaryEmail">
                            <label>Secondary Email <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="secondaryEmail" name="secondary_email" value=""
                                placeholder="Enter Title">

                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="secondaryPhone">
                            <label>Secondary Phone<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="secoundaryPhone" value=""
                                placeholder="Enter Title">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" id="website">
                            <label>Website <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="website" name="Website" value=""
                                placeholder="Enter Title">

                            <font style="color:red"> {{ $errors->has('Website') ? $errors->first('Website')
                                : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="facebookLink">
                            <label>Facebook Link<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="facebookLink" name="facebookLink" value=""
                                placeholder="Enter Title">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" id="linkInLink">
                            <label>LinkIn Link <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="linkInLink" name="linkInLink" value=""
                                placeholder="Enter Title">

                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>
                    {{--  <div class="col-sm-6">
                        <div class="form-group" id="primaryAddress">
                            <label>Primary Address<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="primaryAddress" name="primaryAddress" value=""
                                placeholder="Enter Title">
                            <font style="color:red"> {{ $errors->has('category') ?
                                $errors->first('category') : '' }} </font>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>
<!-- /.card -->
@endsection
@section('scripts')
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-Token': '{{csrf_token()}}'}
        });

        var id = $('input[name="id"]').val();
        $('#photo').change(function () {
            var photo = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('id', id);
            formData.append('photo', photo);

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            console.log(percentComplete);
                            $('.progress-bar').css('width', percentComplete + '%');
                            if (percentComplete === 100) {
                                console.log('completed 100%')

                                var imageUrl = window.URL.createObjectURL(photo)
                                $('.imgPreview').attr('src', imageUrl);
                                setTimeout(function () {
                                    $('.progress-bar').css('width', '0%');
                                }, 2000)
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: '',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(!res.success){alert(res.error)}
                }
            })
        })
    })
</script>