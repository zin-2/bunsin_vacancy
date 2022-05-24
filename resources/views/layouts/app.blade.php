<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" media="all">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.bootstrap4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="http://tutorialsplane.com/wp-content/uploads/2015/10/datepicker.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.header')
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @include('layouts.partials.breadcrumb')
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        @include('layouts.partials.footer')
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('/js/jquery.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('css/responsive.bootstrap4.min.css')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap4.min.js')}}"></script>
    <script src="http://tutorialsplane.com/wp-content/uploads/2015/10/bootstrap-datepicker.js"></script>
    <script src="{{asset('js/jszip.min.js')}}"></script>
    <script src="{{asset('js/pdfmake.min.js')}}"></script>
    <script src="{{asset('js/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- AdminLTE App -->

    <script src="{{asset('/js/adminlte.js') }}"></script>
    @yield('scripts')
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/js/demo.js') }}"></script>
    <script>
//Date picker

        $(function() {
            //$("#example1").DataTable({
                //"responsive": true
                //, "lengthChange": false
              //  , "autoWidth": false
            //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

       // });
            });


        $('#summernote').summernote({
            placeholder: 'Description'
            , tabsize: 2
            , height: 200
            , toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']]
                , ['para', ['ul', 'ol', 'paragraph']]
            , ]
        });
         $('#post_description').summernote({
            placeholder: 'Post Description'
            , tabsize: 2
            , height: 200
            , toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']]
                , ['para', ['ul', 'ol', 'paragraph']]
            , ]
        });
        $('#summernote_1').summernote({
            placeholder: 'Application Information'
            , tabsize: 2
            , height: 200
            , toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']]
                , ['para', ['ul', 'ol', 'paragraph']]
            , ]

        });

    </script>


</body>
</html>
