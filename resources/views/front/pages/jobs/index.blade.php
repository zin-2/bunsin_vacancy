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
    <style>
        .job-item {
            border: 1px solid transparent;
            border-radius: 2px;
            box-shadow: 0 0 45px rgb(0 0 0 / 8%);
            transition: .5s;
        }

        .g-4,
        .gy-4 {
            --bs-gutter-y: 1.5rem;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .text-start {
            text-align: left !important;
        }

        .ps-4 {
            padding-left: 1.5rem !important;
        }

        small,
        .small {
            font-size: .875em;
        }

        .me-3 {
            margin-right: 1rem !important;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        .text-primary {
            color: #003366 !important;
        }

        .btn-apply {
            border-radius: 0px;
        }

        .p-4 {
            padding: 1rem !important;
        }
    </style>

</head>

<body>

    <header id="header" class="clearfix">
        @include('front.partials.header')
    </header>
    <section class="job-bg page job-list-page">
        <div class="container">
            <div class="breadcrumb-section">

                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Job List</li>
                </ol>
                <h2 class="title">Software Engineer</h2>
            </div>
            
            <div class="banner-form banner-form-full job-list-form">

                <form action="{{ route('job-search') }}" method="POST" class="clearfix">
                    @csrf
                    <div class="dropdown category-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Category</span> <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            @foreach ($category as $categories)
                            <li><a href="#">{{ $categories->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown category-dropdown language-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change language-change">
                            @foreach ($province as $provinces)
                            <li><a href="#">{{ $provinces->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <input type="text" name="q" class="form-control" placeholder="Type your key word">
                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                </form>
            </div>
            <div class="category-info">
                <div class="row">
                    <div class="container">
                        @foreach ( $job as $jobs)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="https://demo.htmlcodex.com/2246/job-portal-website-template/img/com-logo-1.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"><a href="{{ url('vacancy/'.$jobs->id) }}"> {{ $jobs->title
                                                }}</a></h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker text-primary me-2"></i> {{ $jobs->province->name
                                            }} </span>
                                        <span class="text-truncate me-3"><i class="fa fa-clock-o text-primary me-2"></i>
                                            {{ $jobs->job_type }} </span>
                                        <span class="text-truncate me-0"><i class="fa fa-money text-primary me-2"></i>
                                            {{ $jobs->salary.' - '.$jobs->salary_upto }} USD</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary btn-apply" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="fa fa-calendar text-primary me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="text-center">
                            {!! $job->links() !!}
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>

</html>