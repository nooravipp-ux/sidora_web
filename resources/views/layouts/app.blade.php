<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DISPORA | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/front.css')}}" rel="stylesheet">
</head>


<body class="">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

            <div id="logo">
                <a href="/"><img src="{{asset('/images/logo dispora.png')}}" alt="" width="150" height="50"></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!-- <h1><a href="index.html">Regna</a></h1> -->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto active" href="/login">login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->
    @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Dispora Kabupaten bandung</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
                <!-- Support by <a href="https://bootstrapmade.com/">Aranka Tech Solution</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('front/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="h{{asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    <script src="{{asset('vendor/select2/dist/js/select2.full.min.js')}}"></script>

    @yield('additional-js')
</body>

</html>
