<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>KH-WORKS</title>

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
                    <li>/ Blog</li>
                </ol>
                <h2 class="title">Post Page</h2>
            </div>
            <div class="banner-form banner-form-full job-list-form">

            </div>
            <div class="category-info">
                <div class="row">
                    <div class="section latest-jobs-ads">
                        <div class="section-title tab-manu">
                            <h4>Blog</h4>
                        </div>
                        <div class="tab-content">
                             @foreach ($post as $posts)
                                 
                      
                                <div class="job-ad-item">
                                    <div class="item-info">
                                        <div class="item-image-box">
                                            <div class="item-image">
                                                <a href="{{ route('post_page_detail',[$posts->id]) }}"><img src="{{ asset('resume/'.$posts->image) }}" alt="Image" class="img-fluid"></a>
                                            </div>
                                        </div>
                                        <div class="ad-info">
                                            <span><a href="{{ route('post_page_detail',[$posts->id]) }}" class=title>{{ $posts->title }}</a> </span>
                                            <div class="ad-meta">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{!! Illuminate\Support\Str::limit($posts->description,80) !!}</a></li>
                                                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Posting Date : {{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="button">
                                            <a href="{{ route('post_page_detail',[$posts->id]) }}" class="btn btn-primary">Read More </a>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                                
                            </div>
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>
</html>

