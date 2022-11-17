<!doctype html>
<html lang="en">

<head>
    <title>KH-WORKS | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-14/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   
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
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                                <form class="signin-form" action="{{ route('register') }}" method="post">
                                    @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" onchange="ajaxfunction(this.value);" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group mb-3">
                                    <select name="user_role" id="user_role" class="form-control">
                                        <option value="">--- Select Roles ---</option>
                                        <option value="2">Employee</option>
                                        <option value="0">Employer</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Password">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Retype password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                            </form>
                            <p class="text-center">Are you a member? <a data-toggle="tab" href="{{route('login')}}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-14/js/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
<script type="text/javascript">

    //Date picker

        //Date and time picker
            function ajaxfunction(val) {
                            $.ajax({
                        url: "{{url('check-email')}}" + '/' + val
                        , type: "GET"
                        , data: {
                            email: val
                            , _token: '{{csrf_token()}}'
                        }
                        , dataType: 'json'
                        , success: function(res) {
                            //console.log(res);
                            if(res.email == val){
                                toastr.warning("This email has been registered !");
                            }else{
                                toastr.success("Email Validate !");
                            }

                        }
                        , error: function(err) {
                            console.log(err);
                        }
                    });
            };
    </script>  