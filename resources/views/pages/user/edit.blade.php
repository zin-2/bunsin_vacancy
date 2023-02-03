@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

    @section('content')
    <form name="add-category" id="add-blog-post-form" method="POST" action="{{route('user.update',$user->id)}}">
        @csrf
        @method('patch')
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Update Profies</h4>
        <button type="submit" class="btn bg-success float-right">
            <i class="fa fa-save"></i> Save
        </button>
        </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user"></i> Account Details</h3>
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
                        <label for="exampleInputEmail1">User Name</label>
                        <input disabled  type="text" value="{{$user->name}}" class="form-control" name="name"
                            placeholder="Enter User">
                        <font style="color:red"> {{ $errors->has('name') ? $errors->first('name') : '' }} </font>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input disabled  type="email" value="{{$user->email}}" class="form-control" name="email"
                            placeholder="Enter Email">
                        <font style="color:red"> {{ $errors->has('name') ? $errors->first('name') : '' }} </font>
                    </div>
                </div>
                {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                </div> --}}
                <!-- /.card-body -->
                <!-- /.card-footer-->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user"></i> Profile Photo</h3>

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

                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="display: flex;">
                                        <div>
                                            <img class="imgPreview img" width="150"
                                                src="https://via.placeholder.com/80">
                                        </div>
                                        <div style="margin-left: 15px; flex-grow: 1">
                                            <p>Choose a file </p>
                                            <input id="photo" name="photo" type="file">
                                            <font style="color:red"> {{ $errors->has('photo]') ? $errors->first('photo')
                                                : '' }} </font>
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
                </div>
                {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                </div> --}}
                <!-- /.card-body -->
                <!-- /.card-footer-->
            </div>


        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user"></i> Profile Details</h3>

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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profession<span class="text-danger">*</span> </label>
                                <select class="form-control" name="professional">
                                    <option value="">Profession</option>
                                    <option value="Trainee">Trainee</option>
                                    <option value="Junior Staff">Junior Staff</option>
                                    <option value="Senior Staff">Senior Staff</option>
                                    <option value="Supervision">Supervision</option>
                                    <option value="Management">Management</option>
                                    <option value="Senior Management">Senior Management</option>
                                    <option value="Head Department">Head Department</option>
                                    <option value="C Level">C Level</option>
                                </select>
                                <font style="color:red"> {{ $errors->has('education') ? $errors->first('education') : ''
                                    }}
                                </font>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Experience <span class="text-danger">*</span> </label>
                                <select class="form-control" name="experience" id="experience">
                                    <option value="">Experience</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">3+ Year</option>
                                    <option value="5">5+ Year</option>
                                    <option value="8">8+ Year</option>
                                    <option value="10">10+ Year</option>
                                </select>
                                <font style="color:red"> {{ $errors->has('experience') ? $errors->first('experience') :
                                    '' }}
                                </font>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Role</label>
                                <select class="form-control" name="job_roles">
                                    <option value="">Job Role</option>
                                    <option value="team Lead">Team Lead</option>
                                    <option value="Trainee">Manager</option>
                                    <option value="Junior Staff">Assist Manager</option>
                                    <option value="Senior Staff">Executive</option>
                                    <option value="Supervision">Director</option>
                                    <option value="Management">Administrator</option>
                                    <option value="Senior Management">Production</option>
                                    <option value="Head Department">Officer</option>
                                    <option value="C Level">Senior/option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
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
                                <font style="color:red"> {{ $errors->has('education') ? $errors->first('education') : ''
                                    }}
                                </font>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Personal Website</label>
                                <input required type="email" value="{{$user->email}}" class="form-control"
                                    name="website" placeholder="Enter website">
                                <font style="color:red"> {{ $errors->has('name') ? $errors->first('name') : '' }}
                                </font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Birth Date <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" id="birth_date" name="birth_date"
                                    placeholder="MM/DD/YYY" />
                                @if ($errors->has('birth_date'))
                                <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">Gender</option>
                                    <option value="single" {{ old('gender')=='single' ? 'selected' :'' }}>Single
                                    </option>
                                    <option value="married" {{ old('gender')=='married' ? 'selected' :'' }}>Married
                                    </option>
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lanauges</label>
                                <select name="languages[]" class="select2" multiple="" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option data-select2-id="34">English</option>
                                    <option data-select2-id="35">Chiness</option>
                                    <option data-select2-id="36">Japens</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Skills</label>
                                <select name="skills[]" class="select3" multiple="" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option data-select2-id="33">Alabama</option>
                                    <option data-select2-id="34">Alaska</option>
                                    <option data-select2-id="35">California</option>
                                    <option data-select2-id="36">Delaware</option>
                                    <option data-select2-id="37">Tennessee</option>
                                    <option data-select2-id="38">Texas</option>
                                    <option data-select2-id="39">Washington</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bio <span class="text-danger">*</span></label>
                                <textarea name="bio" id="bio"></textarea>
                                @if ($errors->has('requirement'))
                                <span class="text-danger">{{ $errors->first('requirement') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
        </div> --}}
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    </div>
</form>
<!-- /.card -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('.select3').select2();
        });

        $('#birth_date').datepicker({
            //  format: 'yyyy-mm-dd'
            format: 'yyyy-mm-dd',
                          autoclose: true,
                          todayHighlight: true
          });

</script>
@endsection