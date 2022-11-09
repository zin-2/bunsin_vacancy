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
    <section class=" job-bg ad-details-page">
        <div class="container">
            <div class="breadcrumb-section">

                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Pricing</li>
                </ol>
                         <h5 class="title">Pricing</h2>Choose a package to unlock Premium/Regular jobs posting ability.To get a large amount of quality application, choose the premium package.</h5><br/><br/>
<hr/>

            </div>
    
            <div class="job-postdetails post-resume">
                <div class="row">

                <div class="col-xs-12 col-md-4">
                    <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                        <h1 class="display-4">$0</h1>
                        <h3>Free</h3>

                        <div class="pricing-package-ribbon pricing-package-ribbon-light">Regular</div>

                        <p class="mb-2 text-muted"> No Premium Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Applicants</p>
                        <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                        <p class="mb-2 text-muted"> No support available</p>

                        <a href="" class="btn btn-success mt-4"><i class="fa fa-sign-in"></i> Sign Up</a>
                    </div>
                </div>
                @foreach ($pricing as  $pricings)

                <div class="col-xs-12 col-md-4">
                    <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                        <h1 class="display-4">{{ $pricings->price."USD" }}</h1>
                        <h3>Free</h3>
                        <div class="pricing-package-ribbon pricing-package-ribbon-light">{{ $pricings->package_name }}</div>
                        <p class="mb-2 text-muted"> Available Job Post <strong style="color:red;">{{ $pricings->preminum_job }}</strong></p>
                        <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Applicants</p>
                        <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                        <p class="mb-2 text-muted"> No support available</p>

                        <a href="" class="btn btn-success mt-4"><i class="fa fa-product-hunt"></i> Purchas Package</a>
                    </div>
                </div>
                                      
                @endforeach
                  
            </div>
            </div>
        </div>
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>
</html>

