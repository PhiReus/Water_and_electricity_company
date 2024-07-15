<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

    <meta name="author" content="themefisher.com">

    <title>Megakit| Html5 Agency template</title>

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('blog/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('blog/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('blog/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
    <link rel="stylesheet" href="https://www.cssscript.com/demo/alert-confirm-toast-cute/style.css" />
    <script src="https://www.cssscript.com/demo/alert-confirm-toast-cute/cute-alert.js"></script>

</head>

<body>

    <!-- Header Start -->

    @include('includes.header_blog_single');

    <!-- Header Close -->

    <div class="main-wrapper ">
       @yield('content')


        <!-- footer Start -->
        @include('includes.footer_blog_single');

    </div>

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('blog/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('blog/js/contact.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('blog/plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('blog/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--  Magnific Popup-->
    <script src="{{ asset('blog/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('blog/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('blog/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('blog/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('blog/plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="{{ asset('blog/js/script.js') }}"></script>

</body>

</html>

