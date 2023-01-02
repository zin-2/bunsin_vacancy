@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<form name="add-category" id="add-blog-post-form" method="post" action="{{route('job.store')}}">
    @csrf
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
                        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                            name="title" value="{{old('title')}}" placeholder="Enter Title">
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{ $errors->has('idCompany') ? 'has-error' : ''}}">
                                <label for="Return_Type">Company <span class="text-danger">*</span></label>
                                <select name="idCompany" id="Return_Type" class="form-control">
                                    <option value="">Company</option>
                                    @foreach($company as $companies)
                                    <option value="{{ $companies->id }}">{{ $companies->company_name }}</option>
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
                                    <option value="{{$categories->id}}">{{$categories->name}}</option>
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
                                <input type="number"
                                    class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="vacancy"
                                    value="{{old('vacancy')}}" name="vacancy" value="{{old('vacancy')}}"
                                    placeholder="Enter Vacancy">
                                @if ($errors->has('vacancy'))
                                <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Closing Date <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" id="closing_date" name="closing_date"
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
                                <option value="monthly" {{ old('salary_cycle')=='monthly' ? 'selected' :'' }}>
                                    Monthly</option>
                                <option value="yearly" {{ old('salary_cycle')=='yearly' ? 'selected' :'' }}>Yearly
                                </option>
                                <option value="weekly" {{ old('salary_cycle')=='weekly' ? 'selected' :'' }}>Weekly
                                </option>
                                <option value="daily" {{ old('salary_cycle')=='daily' ? 'selected' :'' }}>Daily
                                </option>
                                <option value="hourly" {{ old('salary_cycle')=='hourly' ? 'selected' :'' }}>Hourly
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
                                value="{{old('min_salary')}}" placeholder="Minimum Salary">
                                @if ($errors->has('min_salary'))
                                    <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Maximum Salary <span class="text-danger">*</span></label>
                            <input type="number" id="max_salary" class="form-control" name="max_salary"
                                value="{{old('max_salary')}}" placeholder="Maximum Salary">
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
                            <option value="1">1 Year</option>
                            <option value="2" >2 Year</option>
                            <option value="3" >3+ Year</option>
                            <option value="5" >5+ Year</option>
                            <option value="8" >8+ Year</option>
                            <option value="10" >10+ Year</option>
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
                            <option value="Trainee">Trainee</option>
                            <option value="Junior Staff">Junior Staff</option>
                            <option value="Senior Staff">Senior Staff</option>
                            <option value="Supervision">Supervision</option>
                            <option value="Management">Management</option>
                            <option value="Senior Management">Senior Management</option>
                            <option value="Head Department">Head Department</option>
                            <option value="C Level">C Level</option>
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
                            <option value="any" {{ old('gender')=='any' ? 'selected' :'' }}>Any</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' :'' }}>Male</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' :'' }}>Female
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
                            <option value="Full Time" {{ old('job_type')=='full_time' ? 'selected' :'' }}>Full
                                Time</option>
                            <option value="Internship" {{ old('job_type')=='internship' ? 'selected' :'' }}>
                                Internship</option>
                            <option value="Part Time" {{ old('job_type')=='part_time' ? 'selected' :'' }}>Part
                                Time</option>
                            <option value="Contract" {{ old('job_type')=='contract' ? 'selected' :'' }}>Contract
                            </option>
                            <option value="Temporary" {{ old('job_type')=='temporary' ? 'selected' :'' }}>
                                Temporary</option>
                            <option value="Tommission" {{ old('job_type')=='commission' ? 'selected' :'' }}>
                                Commission</option>
                            <option value="Internship" {{ old('job_type')=='internship' ? 'selected' :'' }}>
                                Internship</option>
                        </select>
                        <font style="color:red"> {{ $errors->has('jobType') ? $errors->first('jobType') : '' }}
                        </font>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="summernote"></textarea>
                            <font style="color:red"> {{ $errors->has('description') ? $errors->first('description') : ''
                                }}
                            </font>
                    </div>
                </div>
              
                <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Application Information <span
                                    class="text-danger">*</span></label>
                            <textarea name="requirement" id="summernote_1"></textarea>
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