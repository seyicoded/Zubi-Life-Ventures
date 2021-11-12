@extends('layout.app')

@section('content')
    <style>
        #hero{
            background-image: url("{{url('auto_images/category/'.$data['cat']->main_image)}}") !important;
        }
    </style>
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
            <h1>{{$data['cat']->category_name}}<span>.</span></h1>
            <h2>{{$data['cat']->mini_desc}}</h2>

            <br />
            <a name="" id="" class="btn btn-warning" href="#main" role="button">CLICK TO SIGN IN</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sign In</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Sign In</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
          aa
        </p>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
