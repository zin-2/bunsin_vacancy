<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>Jobs | Job Portal / Job Board </title>

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
    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <marquee> <h1 class="title">The Easiest Way to Get Your New Job </h1> </marquee> 
            <h3>We offer <strong style="color:#00a651;">{{ $vacancy }} </strong>jobs vacation right now</h3>
            <div class="banner-form">
                <form action="{{ route('job-search') }}" method="POST" class="clearfix">
                @csrf
                    <input type="text" name="q" class="form-control" placeholder="Type your key word">
                    <div class="dropdown category-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                          @foreach ($location as $locations)                
                                <li><a href="#">{{ $locations->name }}</a></li>
                          @endforeach
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                </form>
            </div>
          
        </div>
    </div>
    <div class="page">
        <div class="container">
            <div class="section category-items job-category-items  text-center">
                <ul class="category-list">
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/1.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Accounting/Finance</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/2.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Education/Training</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/3.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Engineer/Architects</span>
                            <span class="category-quantity">(212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/4.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Garments/Textile</span>
                            <span class="category-quantity">(972)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/5.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">HR/Org. Development</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/6.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Design/Creative</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/7.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Research/Consultancy</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/8.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Medical/Pharma</span>
                            <span class="category-quantity">(76212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/9.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Music & Arts</span>
                            <span class="category-quantity">(212)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/10.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Marketing/Sales</span>
                            <span class="category-quantity">(1298)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/11.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Production/Operation</span>
                            <span class="category-quantity">(124)</span>
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="job-list.html">
                            <div class="category-icon"><img src="https://demo.themeregion.com/jobs/images/icon/12.png" alt="images" class="img-fluid"></div>
                            <span class="category-title">Miscellaneous</span>
                            <span class="category-quantity">(972)</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu">
                    <h4>Latest Jobs</h4>

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#hot-jobs" data-toggle="tab">Hot Jobs</a></li>
                        <li role="presentation"><a href="#recent-jobs" data-toggle="tab">Recent Jobs</a></li>
                        <li role="presentation"><a class="active" href="#popular-jobs" data-toggle="tab">Popular Jobs</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in" id="hot-jobs">
                        @foreach ($job as $jobs)
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="job-details.html"><img src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
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
                    <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
                        @foreach ($job as $jobs)
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="job-details.html"><img src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
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
                                        <a href="job-details.html"><img src="https://demo.themeregion.com/jobs/images/job/3.png" alt="Image" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>{{ $jobs->title }}</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
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
                </div>
            </div>
            <div class="ad-section text-center">
                <a href="#"><img src="https://demo.themeregion.com/jobs/images/ads/3.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="section workshop-traning">
                <div class="section-title">
                    <h4>Workshop Traning</h4>
                    <a href="#" class="btn btn-primary">See all</a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="workshop">
                            <img src="https://demo.themeregion.com/jobs/images/job/5.png" alt="Image" class="img-fluid">
                            <h3><a href="#">Business Process Management Training</a></h3>
                            <h4>Course Duration: 3 Month ( Sat, Mon, Fri)</h4>
                            
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                </div>
                                <div class="user-option pull-right">
                                    <a href="#"><i class="fa fa-map-marker"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="workshop">
                            <img src="https://demo.themeregion.com/jobs/images/job/6.png" alt="Image" class="img-fluid">
                            <h3><a href="#">Employee Motivation and Engagement</a></h3>
                            <h4>Course Duration: 3 Month ( Sat, Mon, Fri)</h4>
                          
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                </div>
                                <div class="user-option pull-right">
                                    <a href="#"><i class="fa fa-map-marker"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section cta cta-two text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-jobs">
                                <img src="https://demo.themeregion.com/jobs/images/icon/31.png" alt="Icon" class="img-fluid">
                            </div>
                            <h3>3,412</h3>
                            <h4>Live Jobs</h4>
                            <p>We’re on a mission to build a better future where technology creates good jobs for everyone.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-cta">

                            <div class="cta-icon icon-company">
                                <img src="https://demo.themeregion.com/jobs/images/icon/32.png" alt="Icon" class="img-fluid">
                            </div>
                            <h3>12,043</h3>
                            <h4>Total Company</h4>
                            <p>Delivering the best result job search engine for our business partners.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-candidate">
                                <img src="https://demo.themeregion.com/jobs/images/icon/33.png" alt="Icon" class="img-fluid">
                            </div>
                            <h3>5,798,298</h3>
                            <h4>Total Candidate</h4>
                            <p>To connect human capital needs to human capital markets via digitized trustable, innovative and attractive job platform.</p>
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
