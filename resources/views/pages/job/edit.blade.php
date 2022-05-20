@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Job Posting</h3>

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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('job.update',[$job->id])}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1">Announcement Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" value="{{ $job->title }}" placeholder="Enter Title">
                <font style="color:red"> {{ $errors->has('title') ?  $errors->first('title') : '' }} </font>
            </div>
            <div class="row">
                 <div class="col-sm-12">
                    <div class="form-group">
                        <label>Company <span class="text-danger">*</span> </label>
                        <select id="idCompany" name="idCompany" class="form-control">
                            <option>-- Please Select Company --</option>
                            @foreach ($company as $companies)
                                <option value="{{$companies->id}}" {{(old('title', $job->company->id) == $companies->id ? 'selected' : '')}} > {{$companies->company_name}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('idCompany') ?  $errors->first('idCompany') : '' }} </font>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Job Posting Type</label>
                        <select id="category" name="category" class="form-control">
                            <option>-- Please Select Category --</option>
                            @foreach ($category as $categories)
                             <option value="{{$categories->id}}" {{(old('title', $categories->id) == $job->category->id ? 'selected' : '')}} > {{$categories->name}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('category') ?  $errors->first('category') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Province <span class="text-danger">*</span> </label>
                        <select id="fetchProviceIds" name="idProvince" class="form-control">
                            <option>-- Please Select Province --</option>
                            @foreach ($province as $provinces)
                           <option value="{{$provinces->id}}" {{(old('title', $job->province->id) == $provinces->id ? 'selected' : '')}} > {{$provinces->name}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('idProvince') ?  $errors->first('idProvince') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>District <span class="text-danger">*</span> </label>
                        <select id="idDistrict" name="idDistrict" class="form-control">
                          @foreach ($district as $districts)
                             <option value="{{$districts->id}}" {{(old('title', $job->district->id) == $districts->id ? 'selected' : '')}} > {{$districts->name}} </option>
                         @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('idDistrict') ?  $errors->first('idDistrict') : '' }} </font>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Job Type <span class="text-danger">*</span> </label>
                          <select class="form-control" name="jobType" id="job_type">
                           <option>-- Please Select Job Type --</option>
                            <option value="Full Time" {{ $job->job_type == 'Full Time' ? 'selected':'' }}>Full Time</option>
                            <option value="Internship" {{ $job->job_type == 'Internship' ? 'selected':'' }}>Internship</option>
                            <option value="Part_time" {{ $job->job_type == 'Part Time' ? 'selected':'' }}>Part Time</option>
                            <option value="Contract" {{ $job->job_type == 'Contract' ? 'selected':'' }}>Contract</option>
                            <option value="Temporary" {{ $job->job_type == 'Temporary' ? 'selected':'' }}>Temporary</option>
                            <option value="Commission" {{ $job->job_type  == 'Commission' ? 'selected':'' }}>Commission</option>
                            <option value="Internship" {{ $job->job_type == 'Internship' ? 'selected':'' }}>Internship</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('jobType') ?  $errors->first('jobType') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Vacancy <span class="text-danger">*</span> </label>
                         <input type="number" class="form-control" name="vacancy" value="{{ $job->vacancy }}" placeholder="Enter Vacancy">
                        <font style="color:red"> {{ $errors->has('vacancy') ?  $errors->first('vacancy') : '' }} </font>
                    </div>
                </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gender <span class="text-danger">*</span> </label>
                            <select class="form-control" name="gender" id="gender">
                             <option>-- Please Select Gender --</option>
                            <option value="any" {{ $job->gender == 'any' ? 'selected':'' }}>Any</option>
                            <option value="male" {{ $job->gender == 'male' ? 'selected':'' }}>Male</option>
                            <option value="female" {{ $job->gender == 'female' ? 'selected':'' }}>Female</option>
                            <option value="transgender" {{ $job->gender == 'transgender' ? 'selected':'' }}>Transgender</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('vacancy') ?  $errors->first('vacancy') : '' }} </font>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Salary Cycle <span class="text-danger">*</span> </label>
                        <select class="form-control" name="salaryCycle">
                                <option value="monthly" {{ $job->salary_cycle  == 'monthly' ? 'selected':'' }}>Monthly</option>
                                <option value="yearly" {{ $job->salary_cycle == 'yearly' ? 'selected':'' }}>Yearly</option>
                                <option value="weekly" {{ $job->salary_cycle == 'weekly' ? 'selected':'' }}>Weekly</option>
                                <option value="daily" {{ $job->salary_cycle == 'daily' ? 'selected':'' }}>Daily</option>
                                <option value="hourly" {{ $job->salary_cycle == 'hourly' ? 'selected':'' }}>Hourly</option>

                            </select>
                        <font style="color:red"> {{ $errors->has('salaryCycle') ?  $errors->first('salaryCycle') : '' }} </font>
                    </div>
                </div>

                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>Experience Required (in year/s) <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control" name="yearRequired" value="{{ $job->experience_required_years }}" placeholder="Experience Required (in year/s)">
                        <font style="color:red"> {{ $errors->has('yearRequired') ?  $errors->first('yearRequired') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span> </label>
                        <select class="form-control" name="expLevel">
                            <option value="">-- Select Level --</option>
                             @foreach ($expLeve as $expLeves )
                                   <option value="{{ $expLeves  }}" {{ $job->exp_level == $expLeves ? 'selected':'' }}>{{ $expLeves }}</option>
                             @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('expLevel') ?  $errors->first('expLevel') : '' }} </font>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="isUrgent" id="customCheckbox1" value="" {{ ($job->is_urgent == 1 ? 'checked' : '')}}>
                    <label for="customCheckbox1" class="custom-control-label">Is Urgent?</label>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Salary Range</label>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="is_negotiation" id="customSalary" value="" {{ ($job->is_negotiable == 1 ? 'checked' : '')}} >
                            <label for="customSalary" class="custom-control-label">Is Negotiation?</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label></label>
                        <input type="number" id="salary_from" class="form-control" name="salaryFrom" value="{{  $job->salary  }}" placeholder="From">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label></label>
                        <input type="number" id="salary_to" class="form-control" name="salaryTo" value="{{ $job->salary_upto }}" placeholder="To">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span> </label>
                        @php
                            $level = array("Trainee","Junior Staff","Senior Staff","Supervision","Management","Senior Management","Head Department","C Level");
                        @endphp
                        <select class="form-control" name="levelId">
                            <option value="">-- Select Level --</option>
                            @foreach ($level as $levels)
                                <option value="{{$levels}}" {{ $job->exp_level == $levels? 'selected' : '' }} > {{$levels}} </option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('levelId') ?  $errors->first('levelId') : '' }} </font>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                <textarea name="description" id="summernote">{!! $job->description  !!}</textarea>
                <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Application Information <span class="text-danger">*</span></label>
                <textarea name="requirement" id="summernote_1">{!! $job->requirement  !!}</textarea>
                <font style="color:red"> {{ $errors->has('requirement') ?  $errors->first('requirement') : '' }} </font>
            </div>


    </div>
    <div class="card-footer">

        <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
        <button type="submit" class="btn btn-primary float-right">Save</button>
    </div>
    <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
@section('scripts')
<script>
    //Date and time picker
    $(document).ready(function() {
        $("#salary_from").show();
        $("#salary_to").show();
        $(function() {
            $("#customSalary").click(function() {
                if ($(this).is(":checked")) {
                    $("#salary_from").hide();
                    $("#salary_to").hide();
                } else {
                    $("#salary_from").show();
                    $("#salary_to").show();
                }
            });
        });
        $('#fetchProviceIds').on('change', function() {
            var idProvince = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('fetchState')}}"
                , type: "GET"
                , data: {
                    province_id: idProvince
                    , _token: '{{csrf_token()}}'
                }
                , dataType: 'json'
                , success: function(res) {
                    $('#idDistrict').html('<option value="">-- Select District --</option>');
                    $.each(res.district, function(key, value) {
                        $("#idDistrict").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
    });

</script>
@endsection

