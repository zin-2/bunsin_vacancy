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
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('job.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Announcement Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title')}}" placeholder="Enter Title">
                @if ($errors->has('title'))
                     <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('idCompany') ? 'has-error' : ''}}">
                            <label for="Return_Type">Company <span class="request-alert"></span></label>
                              <select name="idCompany" id="Return_Type" class="form-control">
                                   <option value="">Choose One...</option>
                                       @foreach($company as $companies)
                                          <option value="{{ $companies->id }}">{{ $companies->company_name }}</option>
                                       @endforeach
                               </select>
                               @if ($errors->has('idCompany'))
                                 <span class="text-danger">{{ $errors->first('idCompany') }}</span>
                              @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                        <label>Job Posting Type <span class="request-alert"></span></label>
                        <select id="category" name="category" class="form-control">
                            <option value="">-- Please Select Post Type --</option>
                            @foreach ($category as $categories)
                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Province <span class="text-danger">*</span> </label>
                        <select id="fetchProviceIds" name="idProvince" class="form-control">
                            <option value="">-- Please Select Province --</option>
                            @foreach ($province as $provinces)
                            <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('idProvince') ?  $errors->first('idProvince') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>District <span class="text-danger">*</span> </label>
                        <select id="idDistrict" name="idDistrict" class="form-control">
                            <option value="">-- Please Select District --</option>
                            <option></option>
                        </select>
                        <font style="color:red"> {{ $errors->has('idDistrict') ?  $errors->first('idDistrict') : '' }} </font>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Closing Date <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" id="closing_date" name="closing_date"/>
                        @if ($errors->has('closing_date'))
                            <span class="text-danger">{{ $errors->first('closing_date') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="isUrgent" id="customCheckbox1" value="option1">
                            <label for="customCheckbox1" class="custom-control-label">Is Urgent?</label>

                        </div>
                    </div>

                </div>

            </div>

              <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Salary Cycle <span class="text-danger">*</span> </label>
                        <select class="form-control" name="salaryCycle">
                                <option value="monthly" {{ old('salary_cycle') == 'monthly' ? 'selected':'' }}>Monthly</option>
                                <option value="yearly" {{ old('salary_cycle') == 'yearly' ? 'selected':'' }}>Yearly</option>
                                <option value="weekly" {{ old('salary_cycle') == 'weekly' ? 'selected':'' }}>Weekly</option>
                                <option value="daily" {{ old('salary_cycle') == 'daily' ? 'selected':'' }}>Daily</option>
                                <option value="hourly" {{ old('salary_cycle') == 'hourly' ? 'selected':'' }}>Hourly</option>

                            </select>
                        <font style="color:red"> {{ $errors->has('salaryCycle') ?  $errors->first('salaryCycle') : '' }} </font>
                    </div>
                </div>

                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>Experience Required (in year/s) <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control {{ $errors->has('yearRequired') ? ' is-invalid' : '' }}" name="yearRequired" value="{{old('yearRequired')}} " name="yearRequired" value="{{old('yearRequired')}}" placeholder="Experience Required (in year/s)">
                        <font style="color:red"> {{ $errors->has('yearRequired') ?  $errors->first('yearRequired') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span> </label>
                        <select class="form-control" name="expLevel">
                            <option value="">-- Select Level --</option>
                            <option value="Trainee">Trainee</option>
                            <option value="Junior Staff">Junior Staff</option>
                            <option value="Senior Staff">Senior Staff</option>
                            <option value="Supervision">Supervision</option>
                            <option value="Management">Management</option>
                            <option value="Senior Management">Senior Management</option>
                            <option value="Head Department">Head Department</option>
                            <option value="C Level">C Level</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('expLevel') ?  $errors->first('expLevel') : '' }} </font>
                    </div>
                </div>


            </div>
              <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Job Type <span class="text-danger">*</span> </label>
                          <select class="form-control" name="jobType" id="job_type">
                           <option>-- Please Select Job Type --</option>
                            <option value="Full Time" {{ old('job_type') == 'full_time' ? 'selected':'' }}>Full Time</option>
                            <option value="Internship" {{ old('job_type') == 'internship' ? 'selected':'' }}>Internship</option>
                            <option value="Part Time" {{ old('job_type') == 'part_time' ? 'selected':'' }}>Part Time</option>
                            <option value="Contract" {{ old('job_type') == 'contract' ? 'selected':'' }}>Contract</option>
                            <option value="Temporary" {{ old('job_type') == 'temporary' ? 'selected':'' }}>Temporary</option>
                            <option value="Tommission" {{ old('job_type') == 'commission' ? 'selected':'' }}>Commission</option>
                            <option value="Internship" {{ old('job_type') == 'internship' ? 'selected':'' }}>Internship</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('jobType') ?  $errors->first('jobType') : '' }} </font>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Vacancy <span class="text-danger">*</span> </label>
                         <input type="number" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="vacancy" value="{{old('vacancy')}}" name="vacancy" value="{{old('vacancy')}}" placeholder="Enter Vacancy">
                         @if ($errors->has('vacancy'))
                            <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                          @endif
                        </div>
                </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gender <span class="text-danger">*</span> </label>
                            <select class="form-control" name="gender" id="gender">
                             <option value="">-- Please Select Gender --</option>
                            <option value="any" {{ old('gender') == 'any' ? 'selected':'' }}>Any</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected':'' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected':'' }}>Female</option>
                            <option value="transgender" {{ old('gender') == 'transgender' ? 'selected':'' }}>Transgender</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('vacancy') ?  $errors->first('vacancy') : '' }} </font>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Salary Range</label>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="is_negotiable" id="customSalary" value="1">
                            <label for="customSalary" class="custom-control-label">Is Negotiation?</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label></label>
                        <input type="number" id="salary_from" class="form-control" name="salaryFrom" value="{{old('salary_from')}}" placeholder="From">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label></label>
                        <input type="number" id="salary_to" class="form-control" name="salaryTo" value="{{old('salary_to')}}" placeholder="To">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                <textarea  name="description" id="summernote"></textarea>
                <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Application Information <span class="text-danger">*</span></label>
                <textarea name="requirement" id="summernote_1"></textarea>
                @if ($errors->has('requirement'))
                    <span class="text-danger">{{ $errors->first('requirement') }}</span>
                @endif
            </div>


    </div>
    <div class="card-footer">
        <a class="btn btn-default" href="{{ url()->previous() }}"><i class="fa fa-back"></i> Back</a>
        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Save</button>
    </div>
    <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
@section('scripts')
<script type="text/javascript">

//Date picker
$('#closing_date').datepicker({
  //  format: 'yyyy-mm-dd'
});
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

