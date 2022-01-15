<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zubic Venture</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('Gassets/img/favicon.png')}}" rel="icon">
  <link href="{{url('Gassets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('Gassets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('css/app.css')}}" rel="stylesheet">
  <link href="{{url('css/w3.css')}}" rel="stylesheet">
  <link href="{{url('Gassets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v4.6.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('layout.component.nav')

    @yield('content')

  @include('layout.component.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{('Gassets/vendor/aos/aos.js')}}"></script>
  <script src="{{('Gassets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{('Gassets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{('Gassets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{('Gassets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{('Gassets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{('Gassets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{('js/app.js')}}"></script>
  <script src="{{('Gassets/js/main.js')}}"></script>

</body>

</html>
