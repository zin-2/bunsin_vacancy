@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<form name="add-category" id="add-blog-post-form" method="post" action="{{route('job.update',[$job->id])}}">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Edit Job</h4>
        <button type="submit" class="btn bg-success float-right">
            <i class="fa fa-save"></i> Save
        </button>
        </div>
        </div>

<div class="row">
    
    <div class="col-md-6">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><i class="fab fa-cat-space"></i>Job Details</h3>

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
               
                    <div class="form-group">
                        <label for="exampleInputEmail1">Announcement Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{ $job->title }}" placeholder="Enter Title">
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{ $errors->has('idCompany') ? 'has-error' : ''}}">
                                <label for="Return_Type">Company <span class="text-danger">*</span></label>
                                <select id="idCompany" name="idCompany" class="form-control">
                                    <option>-- Please Select Company --</option>
                                    @foreach ($company as $companies)
                                        <option value="{{$companies->id}}" {{(old('title', $job->company->id) == $companies->id ? 'selected' : '')}} > {{$companies->company_name}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('idCompany'))
                                <span class="text-danger">{{ $errors->first('idCompany') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                                <label>category <span class="text-danger">*</span> <span
                                        class="request-alert"></span></label>
                                <select id="category" name="category" class="form-control">
                                    <option value="">category </option>
                                    @foreach ($category as $categories)
                                        <option value="{{$categories->id}}" {{(old('title', $categories->id) == $job->category->id ? 'selected' : '')}} > {{$categories->name}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Vacancy <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control" name="vacancy" value="{{ $job->vacancy }}" placeholder="Enter Vacancy">
                                @if ($errors->has('vacancy'))
                                <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Closing Date <span class="text-danger">*</span> </label>
                                <input value="{{ date('Y-m-d', strtotime($job->closing_date)) }}" class="form-control" type="text" id="closing_date" name="closing_date"
                                    placeholder="MM/DD/YYY" />
                                @if ($errors->has('closing_date'))
                                <span class="text-danger">{{ $errors->first('closing_date') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
            </div>

            <!-- /.card-body -->
            </form>
            <!-- /.card-footer-->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><i class="fab fa-cat-space"></i>Salary Details</h3>

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
                        <div class="form-group">
                            <label>Salary Type <span class="text-danger">*</span> </label>
                            <select class="form-control" name="salaryCycle">
                                <option value="monthly" {{ $job->salary_cycle =='monthly' ? 'selected' :'' }}>
                                    Monthly</option>
                                <option value="yearly" {{ $job->salary_cycle =='yearly' ? 'selected' :'' }}>Yearly
                                </option>
                                <option value="weekly" {{ $job->salary_cycle =='weekly' ? 'selected' :'' }}>Weekly
                                </option>
                                <option value="daily" {{ $job->salary_cycle =='daily' ? 'selected' :'' }}>Daily
                                </option>
                                <option value="hourly" {{ $job->salary_cycle =='hourly' ? 'selected' :'' }}>Hourly
                                </option>

                            </select>
                            <font style="color:red"> {{ $errors->has('salaryCycle') ? $errors->first('salaryCycle')
                                : '' }} </font>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Minimum Salary <span class="text-danger">*</span></label>
                            <input type="number" id="min_salary" class="form-control" name="min_salary"
                                value="{{ $job->min_salary }}" placeholder="Minimum Salary">
                                @if ($errors->has('min_salary'))
                                    <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Maximum Salary <span class="text-danger">*</span></label>
                            <input type="number" id="max_salary" class="form-control" name="max_salary"
                                value="{{ $job->max_salary }}" placeholder="Maximum Salary">
                                @if ($errors->has('max_salary'))
                                    <span class="text-danger">{{ $errors->first('max_salary') }}</span>
                                @endif
                        </div>
                    </div>
            </div>
        </div>

        <!-- /.card-body -->
        </form>
        <!-- /.card-footer-->
    </div>

</div>
<div class="col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title"><i class="fab fa-cat-space"></i>Description</h3>

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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experience  <span class="text-danger">*</span> </label>
                        <select class="form-control" name="experience" id="gender">
                            <option value="">Experience</option>
                            <option value="1" {{ $job->experience_required_years =='1' ? 'selected' :'' }}>1 Year</option>
                            <option value="2" {{ $job->experience_required_years =='2' ? 'selected' :'' }} >2 Year</option>
                            <option value="3" {{ $job->experience_required_years =='3' ? 'selected' :'' }}>3+ Year</option>
                            <option value="5" {{ $job->experience_required_years =='5' ? 'selected' :'' }}>5+ Year</option>
                            <option value="8" {{ $job->experience_required_years =='8' ? 'selected' :'' }}>8+ Year</option>
                            <option value="10" {{ $job->experience_required_years =='10' ? 'selected' :'' }}>10+ Year</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('experience') ? $errors->first('experience') : '' }}
                        </font>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Education Level <span class="text-danger">*</span> </label>
                        <select class="form-control" name="education">
                            <option value="">Education Level </option>
                            @foreach ($expLeve as $expLeves )
                                <option value="{{ $expLeves  }}" {{ $job->exp_level == $expLeves ? 'selected':'' }}>{{ $expLeves }}</option>
                            @endforeach
                        </select>
                        <font style="color:red"> {{ $errors->has('education') ? $errors->first('education') : '' }}
                        </font>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender <span class="text-danger">*</span> </label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Gender</option>
                            <option value="any" {{ $job->gender =='any' ? 'selected' :'' }}>Any</option>
                            <option value="male" {{ $job->gender =='male' ? 'selected' :'' }}>Male</option>
                            <option value="female" {{ $job->gender =='female' ? 'selected' :'' }}>Female
                            </option>
                           
                        </select>
                        <font style="color:red"> {{ $errors->has('gender') ? $errors->first('gender') : '' }}
                        </font>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Job Type <span class="text-danger">*</span> </label>
                        <select class="form-control" name="jobType" id="job_type">
                            <option value="">Job Type</option>
                            <option value="Full Time" {{ $job->job_type =='Full Time' ? 'selected' :'' }}>Full
                                Time</option>
                            <option value="Internship" {{ $job->job_type =='Internship' ? 'selected' :'' }}>
                                Internship</option>
                            <option value="Part Time" {{ $job->job_type =='Part Time' ? 'selected' :'' }}>Part
                                Time</option>
                            <option value="Contract" {{ $job->job_type =='Contract' ? 'selected' :'' }}>Contract
                            </option>
                            <option value="Temporary" {{ $job->job_type =='Temporary' ? 'selected' :'' }}>
                                Temporary</option>
                            <option value="Tommission" {{ $job->job_type =='Commission' ? 'selected' :'' }}>
                                Commission</option>
                            <option value="Internship" {{ $job->job_type =='Internship' ? 'selected' :'' }}>
                                Internship</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('jobType') ? $errors->first('jobType') : '' }}
                        </font>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="summernote">{!! $job->description  !!}</textarea>
                            <font style="color:red"> {{ $errors->has('description') ? $errors->first('description') : ''
                                }}
                            </font>
                    </div>
                </div>
              
                <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Application Information <span
                                    class="text-danger">*</span></label>
                            <textarea name="requirement" id="summernote_1">{!! $job->requirement  !!}</textarea>
                            @if ($errors->has('requirement'))
                            <span class="text-danger">{{ $errors->first('requirement') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- /.card-body -->
        
        <!-- /.card-footer-->
    </div>

</div>
</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
    //Date picker
$('#closing_date').datepicker({
  //  format: 'yyyy-mm-dd'
  format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
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