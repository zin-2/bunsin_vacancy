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

        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            <li class="nav-item">
                {{--  <a class="nav-link active_tab1" id="list_user_details">User Details</a>  --}}
                <a class="nav-link active_tab1" id="list_user_details" data-toggle="pill" href="#company-info" role="tab"
                    aria-controls="company-info" aria-selected="true">Company Info </a>
            </li>
            <li class="nav-item">
                {{--  <a class="nav-link inactive_tab1" id="list_personal_details">Personal Details</a>  --}}
                <a class="nav-link inactive_tab1" id="list_personal_details" data-toggle="pill" href="#contact-info" role="tab"
                    aria-controls="contact-info" aria-selected="false">Personal Details</a>
            </li>

        </ul>

        <form name="add-category" id="add-blog-post-form" method="POST" action="{{ route('company.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="custom-content-below-tabContent">
                <br />
                <p class="lead mb-0"></p>
                <div class="tab-pane active" id="user_details">
                    {{-- <div class="tab-pane fade active show" id="company-info" role="tabpanel"
                        aria-labelledby="company-info-tab"> --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="exampleInputEmail1">Company Logo <span class="text-danger">*</span></label>
                                        <div class="col-md-12 mb-2">
                                            <img id="image_preview_container" src="{{ asset('images/upload.png') }}"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="company_logo" placeholder="Choose image" id="image">
                                                <font style="color:red"> {{ $errors->has('company_logo') ?
                                                    $errors->first('company_logo') : '' }} </font>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" name="company_name" id="companyName"
                                        placeholder="Enter Company">
                                    <font style="color:red"> {{ $errors->has('company_name') ? $errors->first('company_name') :
                                        '' }} </font>
                                </div>
                                <div class="form-group">
                                    <label>Industry</label>

                                    <select name="industry" id="industry" class="form-control">
                                        <option value="">-- Select Industry --</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Architecture & Design">Architecture & Design</option>
                                        <option value="Electrical Supply">Electrical Supply</option>
                                        <option value="Construction">Construction</option>
                                        <option value="Accounting/Taxation/Auditing">Accounting/Taxation/Auditing</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="description"
                                        id="companyDescription"></textarea>
                                    <font style="color:red"> {{ $errors->has('description') ? $errors->first('description') : ''
                                        }} </font>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary pull-left" id="btn_us">Next</button>

                    </div>
                    <div class="tab-pane" id="personal_details">
                        {{-- <div class="tab-pane fade" id="contact-info" role="tabpanel"
                            aria-labelledby="contact-info-tab"> --}}

                            <div class="form-group">
                                <label>Title</label>
                                @php
                                $title = array("Mrs.","Miss","Ms");
                                @endphp
                                <select name="title" class="form-control">
                                    <option value="">-- Select Title --</option>
                                    @foreach ($title as $titles)
                                    <option value="{{ $titles }}"> {{ $titles }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="first_name" value=""
                                            placeholder="Enter Title">

                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="last_name" value=""
                                            placeholder="Enter Title">
                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="primaryEmail">
                                        <label>Primary Email <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="primary_email" value=""
                                            placeholder="Enter Title">

                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Primary Phone <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="primary_phone" value=""
                                            placeholder="Enter Title">
                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="moreInformation"
                                                id="moreInformation" value="moreInformation">
                                            <label for="moreInformation" class="custom-control-label">More Information
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="secondaryEmail">
                                        <label>Secondary Email <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="secondaryEmail"
                                            name="secondary_email" value="" placeholder="Enter Title">

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
                                        <input type="text" class="form-control" id="facebookLink" name="facebookLink"
                                            value="" placeholder="Enter Title">
                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="linkInLink">
                                        <label>LinkIn Link <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="linkInLink" name="linkInLink"
                                            value="" placeholder="Enter Title">

                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="primaryAddress">
                                        <label>Primary Address<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="primaryAddress"
                                            name="primaryAddress" value="" placeholder="Enter Title">
                                        <font style="color:red"> {{ $errors->has('category') ?
                                            $errors->first('category') : '' }} </font>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" name="previous_btn_personal_details"
                                    id="previous_btn_personal_details" class="btn btn-info">Previous</button>
                                <button type="submit" class="btn btn-primary" name="save">Save</button>
                            </div>
                        </div>


                    </div>
        </form>

    </div>

    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section('scripts')
<script>
    //step form validation
    //step form validation
    $('#btn_us').click(function() {
        //alert('ok');
        var user = $('#company_name').val();
        var password = $('#industry').val();
        if (user == '') {
            alert('Please enter the username');
        }
        if (password == '') {
            alert('Enter the password');
        } else {
            $('#list_user_details').removeClass('active active_tab1');
            $('#list_user_details').removeAttr('href data-toggle');
            $('#user_details').removeClass('active');
            $('#list_user_details').addClass('inactive_tab1');
            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        }
    });
    $('#previous_btn_personal_details').click(function() {
        $('#list_personal_details').removeClass('active active_tab1');
        $('#list_personal_details').removeAttr('href data-toggle');
        $('#personal_details').removeClass('active');
        $('#list_personal_details').addClass('inactive_tab1');
        $('#list_user_details').removeClass('inactive_tab1');
        $('#list_user_details').addClass('active_tab1 active');
        $('#list_user_details').attr('href', '#personal_details');
        $('#list_user_details').attr('data-toggle', 'tab');
        $('#user_details').addClass('active in');
    });


    $("#secondaryPhone").hide();
    $("#secondaryEmail").hide();
    $("#website").hide();
    $("#facebookLink").hide();
    $("#linkInLink").hide();
    $("#primaryAddress").hide();
    $(function() {
        $("#moreInformation").click(function() {
            if ($(this).is(":checked")) {
                $("#secondaryPhone").show();
                $("#secondaryEmail").show();
                $("#website").show();
                $("#facebookLink").show();
                $("#linkInLink").show();
                $("#primaryAddress").show();
            } else {
                $("#secondaryPhone").hide();
                $("#secondaryEmail").hide();
                $("#website").hide();
                $("#facebookLink").hide();
                $("#linkInLink").hide();
                $("#primaryAddress").hide();
            }
        });
    });

</script>
@endsection
