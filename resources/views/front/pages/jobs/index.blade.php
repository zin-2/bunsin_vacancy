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
       
        .card-body+.card-body {
            border-top: 1px solid #e8ebf3;
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
                    {{--  @endforeach  --}}
                    @foreach ( $job as $jobs)
                    <div class="col-md-4">
                        <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex"> 
                                        <img src="{{ asset('images/'.$jobs->company->company_logo) }}"
                                            class=" avatar-md-1" alt="avatar-img">
                                    </div>
                                    <hr/>
                                    <div class="item-card7-desc">
                                        <div class="item-card7-text"> <a href="{{ url('vacancy/'.$jobs->id) }}" class="text-dark">
                                                <h6 class="font-weight-semibold"><strong>{{ $jobs->title }}</strong></h6>
                                            </a>
                                        </div>
                                        <h6>{{ $jobs->category->name }}</h6>
                                        <h6>{{ $jobs->province->name }} <span class="badge badge-dark"></span>
                                    </div>
                                </div>
                                <div class="card-body py-2"> 
                                    <a href="jobs.html" class="icons font-weight-semibold"><i class="fa fa-usd  text-muted me-1"></i> 10,000-20,000</a> 
                                    <a class="me-4 pull-right"><i class="fa fa-clock-o  text-muted me-1"></i> {{ $jobs->job_type }}</a> 
                                </div>
                                <div class="card-body py-2">
                                    <div class="d-flex"> 
                                        <img
                                            src="https://www.spruko.com/demo/rejoin/Rejoin/assets/images/products/logo/img1.png"
                                            class="border brround avatar-md me-2" alt="avatar-img">
                                        <div> 
                                            <a href="profile.html" class="text-default fs-13">
                                                {{ $jobs->company->company_name }} </a>
                                            <small class="d-block text-muted">2 days ago</small> </div>
                                          {{--  <div class="ms-auto text-muted"> <a href="jobs.html" class="btn btn-sm btn-outline-secondary">See Details</a> </div>  --}}
                                    </div>
                                </div>
                                {{--  <div class="d-flex mb-3"><img
                                        src="{{ asset('thumbnail/'.$jobs->company->company_logo ) }}" width="70"
                                        height="70"></div>
                                <span class="part-time"><a href="{{ url('vacancy/'.$jobs->id) }}"> {{ $jobs->title}}</a>
                                </span>
                                <span class="urgent">Urgent</span>
                                <h6><b>{{ $jobs->category->name }}</b></h6>
                                <h6>{{ $jobs->province->name }}- <span class="badge badge-dark">{{ $jobs->job_type }}</span> <span class="pull-right"> {{ $jobs->salary.' - '.$jobs->salary_upto }}
                                        USD </span>
                                </h6>
                                <hr />
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                                href="{{ url('vacancy/'.$jobs->id) }}">Apply Now</a></button>
                                    </div>
                                    <span class="job-list-time order-1"><i class="fa fa-1x fa-clock-o "></i> 2W
                                        ago</span>
                                </div>  --}}
                            </div>
                    </div>
                    @endforeach 
                    <div class="pull-right">
                        {!! $job->links() !!}
                    </div>

                    {{-- <div class="container">
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

                    </div> --}}
                </div>
            </div>
        </div>
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>

</html>