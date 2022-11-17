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
          
.pricing-table .block-heading {
  padding-top: 50px;
  margin-bottom: 40px;
  text-align: center; 
}

.pricing-table .block-heading h2 {
  color: #3b99e0;
}

.pricing-table .block-heading p {
  text-align: center;
  max-width: 420px;
  margin: auto;
  opacity: 0.7; 
}

.pricing-table .heading {
  text-align: center;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1); 
}

.pricing-table .item {
  background-color: #ffffff;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  border-top: 2px solid #5ea4f3;
  padding: 30px;
  overflow: hidden;
  position: relative; 
}

.pricing-table .col-md-5:not(:last-child) .item {
  margin-bottom: 30px; 
}

.pricing-table .item button {
  font-weight: 600; 
}

.pricing-table .ribbon {
  width: 160px;
  height: 32px;
  font-size: 12px;
  text-align: center;
  color: #fff;
  font-weight: bold;
  box-shadow: 0px 2px 3px rgba(136, 136, 136, 0.25);
  background: #4dbe3b;
  transform: rotate(45deg);
  position: absolute;
  right: -42px;
  top: 20px;
  padding-top: 7px; 
}

.pricing-table .item p {
  text-align: center;
  margin-top: 20px;
  opacity: 0.7; 
}

.pricing-table .features .feature {
  font-weight: 600; }

.pricing-table .features h4 {
  text-align: center;
  font-size: 18px;
  padding: 5px; 
}

.pricing-table .price h4 {
  margin: 15px 0;
  font-size: 45px;
  text-align: center;
  color: #2288f9; 
}

.pricing-table .buy-now button {
  text-align: center;
  margin: auto;
  font-weight: 600;
  padding: 9px 0; 
}

      </style>
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

            </div>
            <section class="pricing-table">
                <div class="container">
                    <div class="row justify-content-md-center">
                        {{--  <div class="col-md-5 col-lg-4">
                            <div class="item">
                                <div class="heading">
                                    <h3>BASIC</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="features">
                                    <h4><span class="feature">Full Support</span> : <span class="value">No</span></h4>
                                    <h4><span class="feature">Duration</span> : <span class="value">30 Days</span></h4>
                                    <h4><span class="feature">Storage</span> : <span class="value">10GB</span></h4>
                                </div>
                                <div class="price">
                                    <h4>$25</h4>
                                </div>
                                <button class="btn btn-block btn-outline-primary" type="submit">BUY NOW</button>
                            </div>
                        </div>  --}}
                        @foreach ($pricing as  $pricings)
                        <div class="col-md-5 col-lg-4">
                            <div class="item">
                                <div class="ribbon">Best Value</div>
                                <div class="heading">
                                    <h3>PRO</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="features">
                                    <h4><span class="feature">Full Support</span> : <span class="value">Yes</span></h4>
                                    <h4><span class="feature">Duration</span> : <span class="value">60 Days</span></h4>
                                    <h4><span class="feature">Storage</span> : <span class="value">50GB</span></h4>
                                </div>
                                <div class="price">
                                    <h4>$50</h4>
                                </div>
                                <button class="btn btn-block btn-primary" type="submit"> <i class="fa fa-product-hunt"></i> Purchas Package</button>

                            </div>
                        </div>
                      @endforeach
                        
                    </div>
                </div>
            </section>
            {{--  <div class="job-postdetails post-resume">
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
                  
            </div>  --}}
            </div>
        </div>
    </section>


    @include('front.partials.footer')



    @include('front.partials.script')
</body>
</html>

