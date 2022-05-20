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
    <section class=" job-bg ad-details-page">
        <div class="container">
            <div class="breadcrumb-section">

                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Post Resume</li>
                </ol>
                <h2 class="title">Contact US</h2>
            </div>
            <div class="job-postdetails post-resume">
                <div class="row">
                    <div class="col-lg-8 clearfix">
                        <form action="#">
                            <fieldset>
                                <div class="section express-yourself">
                                    <h4>Contact Us</h4>
                                    <div class="row form-group">
                                        <label class="col-sm-4 label-title">Name </label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" placeholder="ex Jhon Doe">
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <label class="col-sm-4 label-title">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" placeholder="example@gmail.com">
                                        </div>
                                    </div>
                                    <div class="row form-group additional-information">
                                        <label class="col-sm-4 label-title">Additional Information</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" placeholder="Address: 123 West 12th Street, Suite 456 New York, NY 123456\n Phone: +012 345 678 910 \n Email: itsme@surzilegeek.com*"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group photos-resume">
                                        <label class="col-sm-4 label-title">Subject</label>
                                           <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" placeholder="ex Jhon Doe">
                                        </div>
                                    </div>
                                  
                                </div>
                             
                            </fieldset>
                             <div class="buttons pull-right">
                            <a href="#" class="btn">Update Profile</a>
                        </div>
                        </form>
                       
                    </div>

                    <div class="col-lg-4">
                        <div class="section quick-rules">
                            <h4>Quick rules</h4>
                            <p class="lead">Posting an ad on <a href="#">Jobs.com</a> is free! However, all ads must follow our rules:</p>
                            <ul>
                                <li>Make sure you post in the correct category.</li>
                                <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                <li>Do not upload pictures with watermarks.</li>
                                <li>Do not post ads containing multiple items unless it's a package deal.</li>
                               
                            </ul>
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

