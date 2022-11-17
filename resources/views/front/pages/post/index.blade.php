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
        .blog-card .blog-container .blog-author {
            height: 40px;
            width: 40px;
            border-radius: 40px;
            margin-right: 10px;
        }
        .shadow {
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        .blog-card {
            box-shadow: 0 12px 17px rgb(129 140 151 / 10%);
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        .blog-card .blog-container .blog-category {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        .blog-card .blog-container .blog-footer {
            padding: 15px 0px;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .d-flex {
            display: -ms-flexbox!important;
            display: flex!important;
        }
        .blog-card .blog-image {
            width: 60%;
            height: auto;
            position: relative;
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
                    <li>/ Blog</li>
                </ol>
                <h2 class="title">Post Page</h2>
            </div>
            <div class="banner-form banner-form-full job-list-form">

            </div>
            <div class="category-info">
                <div class="row">
                        
                             @foreach ($post as $posts)

                             <div class="col-md-8">
                                <div class="blog-card bg-white mb-4 overflow-hidden d-lg-flex rounded-lg position-relative">
                                    <div class="blog-image overflow-hidden d-flex align-items-center">
                                        <img src="{{ asset('resume/'.$posts->image) }}" alt="" class="blog-thumbnail">
                                    </div>
                                    <div class="p-4 blog-container">
                                        <a href="#!" class="blog-category text-uppercase py-1 px-2 rounded-lg">
                                            <small class="font-weight-bold">Food</small>
                                        </a>
                                        <h4 class="mt-2 font-weight-bold">
                                            <a href="{{ route('post_page_detail',[$posts->id]) }}" class="text-dark" title="Agriculture is good for both humans and animals">{{ $posts->title }}</a>
                                        </h4>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ullam, reprehenderit? Praesentium doloribus soluta, quia.</p>
                                        <div class="blog-footer d-flex justify-content-between align-items-center border-top">
                                            <div>
                                                <a href="#!"><img src="{{ asset('resume/'.$posts->image) }}" alt="" class="blog-author shadow"></a>
                                                <a href="#!" class="text-dark">Administration</a>
                                            </div>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($posts->created_at) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                                
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>
</html>

