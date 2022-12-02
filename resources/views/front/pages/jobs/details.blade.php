/*-----------------------------------------------------
 * NAME : details.blade.php
 * VER : v0.1
 * PROJ : KH-WORKS
 * Copyright 20221129 KH-WORKS All rights reserved
 *-----------------------------------------------------
 */

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>KH-WORKS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/slideshow/favicon.ico') }}">
    @include('front.partials.style')
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <header id="header" class="clearfix">

        @include('front.partials.header')

    </header>
    <section class="job-bg page job-details-page">
        <div class="container">
            <div class="breadcrumb-section">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="job-list.html">Engineer/Architects</a></li>
                    <li>UI & UX Designer</li>
                </ol>
                <h2 style="color:#003366" class="title">{{ $vacancy->title }}</h2>
            </div>
            <div class="job-details">
                <div class="section job-ad-item">
                    <div class="item-info">
                        <div class="item-image-box">
                            <div class="item-image">
                                <img src="https://demo.htmlcodex.com/2246/job-portal-website-template/img/com-logo-1.jpg"
                                    alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="ad-info">
                            <span><a href="#" class="title">{{ $vacancy->title }}</a></span>



                            <div class="ad-meta">
                                <ul>
                                    <li><a href="#">{{ $vacancy->province->name }}</a></li>
                                    <li><a href="#">Full Time</a></li>
                                    <li>{{ $vacancy->salary. ' - '.$vacancy->salary_upto.' $ ' }}</li>
                                    <li>{{ $vacancy->category->name }}</a></li>
                                    <li>Application Deadline : {{ $vacancy->closing_date }}</li>


                                </ul>

                            </div>
                        </div>

                @if(Auth::check())
                <div class="button">
                    <a href="#" data-toggle="modal" data-target="#applyJobModal" class="btn btn-primary"><i
                            class="fa fa-bolt" aria-hidden="true"></i> Apply Nows</a>
                    <a href="#" data-toggle="modal" data-target="#modal_save" class="btn btn-primary"><i
                            class="fa fa-save" aria-hidden="true"></i> Save</a>
                </div>
                @else
                <div class="button">
                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-bolt"
                            aria-hidden="true"></i> Apply Now</a>
                    <a href="#" data-toggle="modal" data-target="#modal_save" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</a>
                </div>
                @endif
                    </div>
                </div>
                <div class="job-details-info">
                    <div class="row">
                        <div class="col-sm-8">

                            <div class="section job-description">

                                <div class="responsibilities">
                                    <h1>Key Responsibilities:</h1>
                                    <p>{!! $vacancy->description !!}</p>
                                </div>
                                <div class="requirements">
                                    <h1>Requirements</h1>
                                    <p>{!! $vacancy->requirement !!}</P>
                                </div>

                            </div>

                            <h1>Contact Information </h1>
                            <hr class="solid">
                            <div class="section job-description">

                                <div class="container-fluid cxt-padded bg-faded">
                                    <div class="row">
                                        <div class="col-md-2 text-md-left text-center">
                                            <img class="rounded" src="https://www.camhr.com/a/_nuxt/img/d0eef02.png"
                                                height="50px;" width="50" alt="Generic placeholder image">
                                        </div>
                                        <div class="col-md-10 text-md-left text-center">
                                            <p class="lead"><i class="fa fa-user" aria-hidden="true"></i> <a href="#"
                                                    target="_blank"><i>{{$vacancy->company->title.'
                                                        '.$vacancy->company->first_name.' '.$vacancy->company->last_name
                                                        }}</i> </a></p>
                                            <p class="mt-0"><i class="fa fa-envelope" aria-hidden="true"></i> {{
                                                $vacancy->company->primary_email}} &nbsp; &nbsp;<i class="fa fa-phone"
                                                    aria-hidden="true"></i> {{ $vacancy->company->primary_phone }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-sm-4">
                            <div class="section job-short-info">
                                <h1>Short Info</h1>
                                <ul>
                                    <li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted:
                                        {{ $vacancy->created_at->diffForHumans() }}</li>
                                    <li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job
                                        poster: <a href="#"></a></li>
                                    <li><span class="icon"><i class="fa fa-industry"
                                                aria-hidden="true"></i></span>Industry: <a href="#">Marketing and
                                            Advertising</a></li>
                                    <li><span class="icon"><i class="fa fa-line-chart"
                                                aria-hidden="true"></i></span>Experience: <a href="#">{{
                                            $vacancy->exp_level }}</a></li>
                                    <li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job
                                        function: {{ $vacancy->category->name }}</li>
                                </ul>
                            </div>
                            <div class="section company-info">
                                <h1>Company Info</h1>
                                <ul>
                                    <li>Compnay Name: <a href="#"><strong>{{ $vacancy->company->company_name
                                                }}</strong></a></li>
                                    <li>Address:<strong>{{ $vacancy->province->name }}</strong> </li>
                                    <li>Compnay SIze: 2k Employee</li>
                                    <li>Industry: <a href="#"><strong>{{ $vacancy->category->name }}</strong></a></li>
                                    <li>Phone: {{ $vacancy->company->primary_phone }}</li>
                                    <li>Email: <a href="{{ $vacancy->company->primary_email }}">{{
                                            $vacancy->company->primary_email }}</a></li>
                                    <li>Website: <a href="{{ $vacancy->company->website }}">{{
                                            $vacancy->company->website }}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="applyJobModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form action="#" method="post" id="applyJob" enctype="multipart/form-data">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" id="job_id" value="{{ $vacancy->id }}" />
                        @if(auth::check())
                        <input type="hidden" id="user_id" value="{{ Auth::user()->id }}" />
                        @else
                        <input type="hidden" id="user_id" value="" />
                        @endif
                        <div style="background-color: #003366;" class="modal-header">
                            <h5 style="color:#fff;" class="modal-title">Online job application form</h5>
                            <button style="color:#fff;" ; type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <p>Do you want to save this job applicaiton ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button style="background-color:#003366;color:#fff;" type="submit" class="btn btn-default"
                                id="report_ad">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="modal fade" id="modal_save" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form action="#" method="post" id="applyJob" enctype="multipart/form-data">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" id="job_id" value="{{ $vacancy->id }}" />
                        @if(auth::check())
                        <input type="hidden" id="user_id" value="{{ Auth::user()->id }}" />
                        @else
                        <input type="hidden" id="user_id" value="" />
                        @endif
                        <div style="background-color: #003366;" class="modal-header">
                            <h5 style="color:#fff;" class="modal-title">Online job application</h5>
                            <button style="color:#fff;" ; type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Do you want to save this job ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button style="background-color:#003366;color:#fff;" type="submit" class="btn btn-default"
                                id="report_ad">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
    @include('front.partials.footer')

    @include('front.partials.script')
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script>
    $(document).ready(function($) {
  // just for the demos, avoids form submit
$("#applyJob").validate({
    rules: {
        name: {
                required: true,
       },resume : {
            required: true, 
       }
    }, submitHandler: function (form) {
         
            var file_data = $('#resume').prop('files')[0];
            var file_size = $('#resume').prop('files')[0].size;
            var form_data = new FormData();
            form_data.append('file_name', file_data);
            var job_id = $('#job_id').val();
            var user_id = $('#user_id').val();
            var notes = $('#notes').val();
            form_data.append('notes', notes);
            if(file_size>2097152) {
                $("#file_error").html("<i style='color:red;'>File size is greater than 2MB</i>");
                return false;
            }else{
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });
          $.ajax({
            url: "{{ url('apply_job') }}/" + job_id +'/'+ user_id ,
            data: form_data,
            type: "POST",
            dataType:"json",
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function(result)
            {
                console.log(result);
                toastr.success('This Vacancy has been Applied !'); 
                window.$('#applyJobModal').modal('hide');
                $("#applyJob").trigger("reset");
            },error : function(err){
                console.log(err);
            }
        });
    }
    }
 });
});
</script>