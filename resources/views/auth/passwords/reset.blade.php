<!doctype html>
<html lang="en">

<head>
    <title>KH-WORKS | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-14/css/style.css">
   
    <style>
        .form-control {
            height: 48px;
            background: #fff;
            color: #000;
            font-size: 16px;
            border-radius: 30px !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

    </style>
</head>


<body>
    <section class="ftco-section">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url(https://jobify.works/assets/img/find_job_primary.dfd3824.png);">
                        </div>
                        
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Reset password</h3>
                                    <hr/>
                                <p>To reset your password, enter the email address you used to sign in</p>

                                </div>
                            </div>

                            <form action="{{route('login')}}" method="POST" class="signin-form">
                                @csrf 
                                <div class="form-group mb-3">
                                    <input name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Get reset link </button>
                                </div>
                               
                            </form>
                            <p class="text-center">Go to Sign In ? <a data-toggle="tab" href="{{route('login')}}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-14/js/jquery.min.js"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-14/js/popper.js"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-14/js/bootstrap.min.jss"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-14/js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"768f61b03de1096c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>