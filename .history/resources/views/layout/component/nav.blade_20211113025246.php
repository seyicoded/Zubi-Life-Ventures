<?php
    $is_signed = isset($_COOKIE[sha1('is_user_signed_in_zubi_venture')]);

?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{url('/')}}">ZL<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="Gassets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
          {{-- for un-signed users --}}
          @if (!$is_signed)
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
          @endif

          {{-- for un-signed users --}}
          @if ($is_signed)
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                {{-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> --}}
                {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
                <li class="dropdown"><a href="#"><span>{{base64_decode($_COOKIE[(sha1('user_name_in_zubi_venture'))])}} ({{base64_decode($_COOKIE[(sha1('user_code_in_zubi_venture'))])}}) </span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="my-investment">My Investments</a></li>
                    {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                    </li> --}}
                    {{-- <li><a href="#">Card Management</a></li> --}}
                    <li><a href="#">Withdrawals</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                </li>
            </ul>
          @endif

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @if (!$is_signed)
      <a href="{{url('sign-in')}}" class="get-started-btn scrollto">Get Started</a>
      @endif


    </div>
  </header><!-- End Header -->
