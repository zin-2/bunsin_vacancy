<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>Jobs | Job Portal / Job Board HTML Template</title>
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
                <h2 class="title">Creative & Design</h2>
            </div>
            <div class="job-details">
                <div class="job-details-info">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section job-description">
                                <div class="responsibilities">
                                    <h1>Key Responsibilities:</h1>
                                  <p style="font-family:'Khmer OS Battambang'">{{ $post->title }}</p>
                                </div>
                                <div class="requirements">
                                    <h1>Requirements</h1>
                                    <p style="font-family:'Khmer OS Battambang'">{!! $post->description !!}</p>
                                </div>

                            </div>
                      

                       
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


