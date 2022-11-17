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
        .box-shadow {
           border-color: #003366;
        }
        .single-feature {
            display: -webkit-box;
            display: -ms-flexbox;
            /*display: flex; */
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 20px;
            border: 1px #003366 solid;
            background: #ffffff;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-feature .feature-icon {
            font-size: 40px;
            line-height: 1;
            padding-right: 20px;
            margin-right: 22px;
            border-right: 1px solid #003366;
            color: #003366;
        }

        .tab-content .tab-pane.active {
            height: auto;
            visibility: visible;
            opacity: 1;
            overflow: visible;
        }

        .single-job {
            height: 100%;
            padding: 25px;
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border: 1px solid #003366;
            background: #ffffff;
            overflow: hidden;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .single-job .info-top {
            position: relative;
            z-index: 9;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
        }

        .single-job .job-image {
            height: auto;
            border: none;
            width: 80px;
            min-width: 80px;
            text-align: center;
            margin: 0 30px 0 0;
            padding: 10px 0;
        }

        .single-job .job-info {
            width: 100%;
            margin: 0 0 0 auto;
            z-index: 9;
            display: block;
        }

        .single-job .job-info .job-info-inner {
            margin-right: 10px;
        }

        .single-job .job-info .job-info-inner .job-info-top {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .single-job .job-info .job-info-inner .job-salary {
            font-size: 17px;
            line-height: 24px;
            font-weight: 600;
            color: #ff2626;
            margin-bottom: 7px;
            display: block;
        }

        .single-job .job-info .job-info-inner .job-meta {
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            color: #666666;
        }

        .single-job .job-info .job-info-inner .job-meta>div:first-child {
            padding-left: 0;
            margin-left: 0;
        }

        .single-job .job-info .job-info-inner .job-meta>div {
            display: inline-block;
            padding-left: 12px;
            margin-right: 12px;
            position: relative;
        }

        single-job .job-info .job-info-inner .job-meta>div {
            display: inline-block;
            padding-left: 12px;
            margin-right: 12px;
            position: relative;
        }

        .single-job .job-info .job-info-inner .job-meta>div {
            display: inline-block;
            padding-left: 12px;
            margin-right: 12px;
            position: relative;
        }

        .single-job .job-info .job-info-inner .job-info-top .saveJob {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            padding: 0;
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
        }

        .featured-label {
            display: inline-block;
            padding: 0 7px;
            font-weight: 700;
            font-size: 14px;
            color: #1dae0e;
            line-height: 20px;
            text-transform: capitalize;
            border-radius: 3px;
            position: relative;
            z-index: 0;
            background: #d0f7ca;
        }
        .carousel-indicators li {
            width: 10px;
            height: 10px;
            border-radius: 100%;
        }
        
    </style>

</head>

<body>

    <header id="header" class="clearfix">

        @include('front.partials.header')
    </header>
    <div class="banner-job">
        <div class="container">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('images/slideshow/slideshow.png') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{--  <h5>First slide label</h5>  --}}
                        {{--  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>  --}}
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('images/slideshow/slideshow.png') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{--  <h5>Second slide label</h5>  --}}
                        {{--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>  --}}
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('images/slideshow/slideshow.png') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{--  <h5>Third slide label</h5>  --}}
                        {{--  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>  --}}
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
        </div>
        <div class="banner-overlay"></div>
        
        {{--  <div class="container text-center">
            <marquee>
                <h1 class="title">The Easiest Way to Get Your New Job </h1>
            </marquee>
            <h3>We offer <strong style="color:#003366;">{{ $vacancy }} </strong>jobs vacation right now</h3>
            <div class="banner-form">
                <form action="{{ route('job-search') }}" method="POST" class="clearfix">
                    @csrf
                    <input type="text" name="q" class="form-control" placeholder="Type your key word">
                    <div class="dropdown category-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            @foreach ($location as $locations)
                            <li><a href="#">{{ $locations->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                </form>
            </div>

        </div>  --}}
    </div>
    <div class="page">
        <div class="container">
            <div class="section category-items job-category-items  text-center">
                <ul class="category-list">
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/1.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Accounting/Finance</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/2.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Education/Training</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/3.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Engineer/Architects</span>
                            <span class="category-quantity">(212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/4.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Garments/Textile</span>
                            <span class="category-quantity">(972)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/5.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">HR/Org. Development</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/6.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Design/Creative</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/7.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Research/Consultancy</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/8.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Medical/Pharma</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/9.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Music & Arts</span>
                            <span class="category-quantity">(212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/10.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Marketing/Sales</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/11.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Production/Operation</span>
                            <span class="category-quantity">(124)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="{{ asset('images/homepage/12.png') }}" alt="images"
                                    class="img-fluid"></div>
                            <span class="category-title">Miscellaneous</span>
                            <span class="category-quantity">(972)</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu">
                    <h4>Jobs</h4>

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#hot-jobs" data-toggle="tab">Hot Jobs</a></li>
                        <li role="presentation"><a href="#recent-jobs" data-toggle="tab">Recent Jobs</a></li>
                        <li role="presentation"><a class="active" href="#popular-jobs" data-toggle="tab">Popular
                                Jobs</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    {{-- <div role="tabpanel" class="tab-pane fade in" id="hot-jobs"> --}}
                        <br />
                        <div class="row">
                            <div class="col-lg-6 mb-30">
                                <!-- Single Job Start  -->
                                <div class="single-job">
                                    <div class="info-top">
                                        <div class="job-image">
                                            <a href="job-details.html">
                                                <img src="https://www.ababank.com/typo3conf/ext/boxmodel/Resources/Private/Templates/ABA/images/aba-web-top-logo.png"
                                                    alt="logo">
                                            </a>
                                        </div>
                                        <div class="job-info">
                                            <div class="job-info-inner">
                                                <div class="job-info-top">
                                                    <div class="saveJob for-listing">
                                                        <span class="featured-label">Urgent</span>
                                                    </div>
                                                    <div class="title-name">
                                                        <h3 class="job-title">
                                                            <a href="job-details.html">Chief Accountant</a>
                                                        </h3>
                                                        <div class="employer-name">
                                                            <a href="employer-details.html">ABA BANK Co.,Ltd</a> | <a
                                                                href="employer-details.html">Ho Chi Minh City</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="job-salary">$700 - $900</span>
                                                <div class="job-meta">
                                                    <div class="job-location"><a href="#" data-toggle="modal"
                                                            data-target="#applyJobModal" style="border-radius: 30px;"
                                                            class="btn btn-primary">Apply Nows</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Job End -->
                            </div>
                            <div class="col-lg-6 mb-30">
                                <!-- Single Job Start  -->
                                <div class="single-job">
                                    <div class="info-top">
                                        <div class="job-image">
                                            <a href="job-details.html">
                                                <img src="https://www.ababank.com/typo3conf/ext/boxmodel/Resources/Private/Templates/ABA/images/aba-web-top-logo.png"
                                                    alt="logo">
                                            </a>
                                        </div>
                                        <div class="job-info">
                                            <div class="job-info-inner">
                                                <div class="job-info-top">
                                                    <div class="saveJob for-listing">
                                                        <span class="featured-label">featured</span>
                                                    </div>
                                                    <div class="title-name">
                                                        <h3 class="job-title">
                                                            <a href="job-details.html">Chief Accountant</a>
                                                        </h3>
                                                        <div class="employer-name">
                                                            <a href="employer-details.html">ABA BANK Co.,Ltd</a> | <a
                                                                href="employer-details.html">Ho Chi Minh City</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="job-salary">$700 - $900</span>
                                                <div class="job-meta">
                                                    <div class="job-location"><a href="#" data-toggle="modal"
                                                            data-target="#applyJobModal" style="border-radius: 30px;"
                                                            class="btn btn-primary">Apply Nows</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Job End -->
                            </div>
                            {{--
                        </div> --}}
                        {{-- @foreach ($job as $jobs) --}}
                        {{-- <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="job-details.html"><img
                                                src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image"
                                                class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San
                                                    Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full
                                                    Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 -
                                                    $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org.
                                                    Development</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div> --}}
                        {{-- @endforeach --}}
                        {{--
                    </div> --}}
                </div>
                {{-- <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
                    @foreach ($job as $jobs)
                    <div class="job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <a href="job-details.html"><img
                                            src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image"
                                            class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="ad-info">
                                <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San
                                                Francisco, CA, US </a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 -
                                                $35,000</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org.
                                                Development</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="button">
                                <a href="#" class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div role="tabpanel" class="tab-pane fade in active show" id="popular-jobs">
                    @foreach ($job as $jobs)
                    <div class="job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <a href="job-details.html"><img
                                            src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image"
                                            class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="ad-info">
                                <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San
                                                Francisco, CA, US </a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 -
                                                $35,000</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org.
                                                Development</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="button">
                                <a href="#" class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
        <div class="ad-section text-center">
            <a href="#"><img src="https://demo.themeregion.com/jobs/images/ads/3.jpg" alt="Image" class="img-fluid"></a>
        </div>
        <div class="section workshop-traning">
            <div class="section-title">
                <h4>Create your professional CV now !</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="workshop">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-icon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Complete Resume</h3>
                                <p>Create resume free &amp; get a job</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="workshop">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Post Job Free</h3>
                                <p>Approach a top million resumes</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="workshop">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30">
                            <div class="feature-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Find Work</h3>
                                <p>Get the best jobs in your areas</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    </div>
    @include('front.partials.footer')

    @include('front.partials.script')

</body>

</html>