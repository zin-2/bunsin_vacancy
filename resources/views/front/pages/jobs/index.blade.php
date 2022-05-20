<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>Jobs | Job Portal / Job Board</title>

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
    <section class="job-bg page job-list-page">
        <div class="container">
            <div class="breadcrumb-section">

                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Engineer/Architects</li>
                </ol>
                <h2 class="title">Software Engineer</h2>
            </div>
            <div class="banner-form banner-form-full job-list-form">
                <form action="{{ route('job-search') }}" method="POST" class="clearfix">
                     @csrf
                    <div class="dropdown category-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Category</span> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            @foreach ($category as $categories)
                                <li><a href="#">{{ $categories->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown category-dropdown language-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
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
                    <div class="col-lg-3 col-md-4">
                        <div class="accordion">
                            <div class="panel-group" id="tr-accordion">
                                <div class="card panel-faq">
                                    <div class="card-header">
                                        <button data-toggle="collapse" data-target="#accordion-one" aria-expanded="true" aria-controls="accordion-one">Categories</button>
                                    </div>
                                    <div id="accordion-one" class="collapse show" data-parent="#tr-accordion">

                                        <div class="panel-body">
                                            <h5><a href="categories-main.html"><i class="fa fa-caret-down"></i> All Categories</a></h5>
                                            <a href="#"><i class="icofont icofont-man-in-glasses"></i>Engineer/Architects</a>
                                            <ul>
                                                <li><a href="#">Software <span>(129)</span></a></li>
                                                <li><a href="#">Architecture <span>(8342)</span></a></li>
                                                <li><a href="#">UI & UX Designer <span>(782)</span></a></li>
                                                <li><a href="#">Telecommunication <span>(5247)</span></a></li>
                                                <li><a href="#">Civil Engineer <span>(634)</span></a></li>
                                                <li><a href="#">Chemical Engineer <span>(453)</span></a></li>
                                                <li><a href="#">Program Development <span>(7986)</span></a></li>
                                                <li><a href="#">Mechanical Engineer <span>(742)</span></a></li>
                                                <li><a href="#">Industrial Engineer <span>(149)</span></a></li>
                                            </ul>
                                            <div class="see-more">
                                                <button type="button" class="show-more one"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
                                                <ul class="more-category one">
                                                    <li><a href="#">Fron end developer<span>(289)</span></a></li>
                                                    <li><a href="#">Back end developer<span>(5402)</span></a></li>
                                                    <li><a href="#">IT Department Manager<span>(3829)</span></a></li>
                                                    <li><a href="#">QA Department Manager<span>(352)</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card panel-faq">
                                    <div class="card-header">
                                        <button class="collapsed" data-toggle="collapse" data-target="#accordion-two" aria-expanded="true" aria-controls="accordion-two">Date Posted</button>
                                    </div>
                                    <div id="accordion-two" class="collapse" data-parent="#tr-accordion">

                                        <div class="panel-body">
                                            <label for="today"><input type="checkbox" name="today" id="today"> Today</label>
                                            <label for="7-days"><input type="checkbox" name="7-days" id="7-days"> 7 days</label>
                                            <label for="30-days"><input type="checkbox" name="30-days" id="30-days"> 30 days</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card  panel-faq">
                                    <div class="card-header">
                                        <button class="collapsed" data-toggle="collapse" data-target="#accordion-three" aria-expanded="true" aria-controls="accordion-three">Salary Range</button>
                                    </div>
                                    <div id="accordion-three" class="collapse" data-parent="#tr-accordion">

                                        <div class="panel-body">
                                            <div class="price-range">
                                                <div class="price">
                                                    <span>$100 - <strong>$700</strong></span>
                                                    <div class="dropdown category-dropdown pull-right">
                                                        <a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
                                                        <ul class="dropdown-menu category-change">
                                                            <li><a href="#">USD</a></li>
                                                            <li><a href="#">AUD</a></li>
                                                            <li><a href="#">EUR</a></li>
                                                            <li><a href="#">GBP</a></li>
                                                            <li><a href="#">JPY</a></li>
                                                        </ul>
                                                    </div>
                                                    <input type="text" value="" data-slider-min="0" data-slider-max="700" data-slider-step="5" data-slider-value="[250,450]" id="price"><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card panel-faq">
                                    <div class="card-header">
                                        <button class="collapsed" data-toggle="collapse" data-target="#accordion-four" aria-expanded="true" aria-controls="accordion-four">Employment Type</button>
                                    </div>
                                    <div id="accordion-four" class="collapse" data-parent="#tr-accordion">

                                        <div class="panel-body">
                                            <label for="full-time"><input type="checkbox" name="full-time" id="full-time"> Full Time</label>
                                            <label for="part-time"><input type="checkbox" name="part-time" id="part-time"> Part Time</label>
                                            <label for="contractor"><input type="checkbox" name="contractor" id="contractor"> Contractor</label>
                                            <label for="intern"><input type="checkbox" name="intern" id="intern"> Intern</label>
                                            <label for="seasonal"><input type="checkbox" name="seasonal" id="seasonal"> Seasonal / Temp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card panel-faq">
                                    <div class="card-header">
                                        <button class="collapsed" data-toggle="collapse" data-target="#accordion-five" aria-expanded="true" aria-controls="accordion-five">Experience Level</button>
                                    </div>
                                    <div id="accordion-five" class="collapse" data-parent="#tr-accordion">

                                        <div class="panel-body">
                                            <label for="training"><input type="checkbox" name="training" id="training"> Training</label>
                                            <label for="entry-level"><input type="checkbox" name="entry-level" id="entry-level"> Entry Level</label>
                                            <label for="mid-senior"><input type="checkbox" name="mid-senior" id="mid-senior"> Mid-Senior Level</label>
                                            <label for="top-level"><input type="checkbox" name="top-level" id="top-level"> Top Level</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-9">
                        <div class="section job-list-item">
                            <div class="featured-top clearfix">
                                <h4>Showing 1-25 of 65,712 ads</h4>
                                <div class="dropdown pull-right">
                                    <div class="dropdown category-dropdown">
                                        <h5>Sort by:</h5>
                                        <a data-toggle="dropdown" href="#"><span class="change-text">Most Relevant</span><i class="fa fa-caret-square-o-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                            <li><a href="#">Most Relevant</a></li>
                                            <li><a href="#">Most Popular</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @foreach ( $job as $jobs)
                            <div class="job-ad-item">
                                <div class="item-info">
                                    <div class="item-image-box">
                                        <div class="item-image">
                                            <a href="job-details.html"><img src="{{ asset("images/".$jobs->company->company_logo)}}" alt="Image" class="img-fluid rounded"></a>
                                        </div>
                                    </div>
                                    <div class="ad-info">
                                        <span><a href="{{ url('vacancy/'.$jobs->id) }}" class="title">{{ $jobs->title }}</a> </span>
                                        <div class="ad-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $jobs->province->name }} </a></li>
                                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $jobs->job_type }}</a></li>
                                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>{{ $jobs->salary.' - '.$jobs->salary_upto."USD" }}</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="text-center">
                                   {!! $job->links() !!}       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-none d-lg-block">
                        <div class="advertisement text-center">
                            <a href="#"><img src="https://demo.themeregion.com/jobs/images/ads/1.jpg" alt="" class="img-fluid"></a>
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

