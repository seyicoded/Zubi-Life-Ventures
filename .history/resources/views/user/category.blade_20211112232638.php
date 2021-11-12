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
            <a name="" id="" class="btn btn-warning" href="#main" role="button">VIEW AVAILABLE INVESTMENT</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$data['cat']->category_name}}</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>{{$data['cat']->category_name}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="w3-row">
          @foreach ($data['packages'] as $dt)
              <div class="w3-col s12 m12 l12 w3-padding w3-margin w3-card w3-round">
                  <div class="w3-row">
                      <div class="w3-col s12 m12 l6">
                          <div id="carouselId" class="carousel slide" data-ride="carousel">
                              {{-- <ol class="carousel-indicators">
                                  <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                  <li data-target="#carouselId" data-slide-to="1"></li>
                                  <li data-target="#carouselId" data-slide-to="2"></li>
                              </ol> --}}
                              <div class="carousel-inner" role="listbox">
                                  <div class="carousel-item active">
                                      <img src="{{url('auto_images/packages/'.$dt->p_image)}}" alt="slide">
                                  </div>
                                  <?php
                                    $o_im = DB::select('SELECT * from package_other_images where p_id = ?', [$dt->p_id]);
                                  ?>
                                  @foreach ($o_im as $image)
                                    <div class="carousel-item active">
                                        <img src="{{url('auto_images/packages_other/'.$image->images)}}" alt="slide">
                                    </div>
                                  @endforeach
                              </div>
                              <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                              </a>
                          </div>
                          {{-- <img src="{{url('auto_images/pa')}}" /> --}}
                      </div>
                      <div class="w3-col s12 m12 l6">a</div>
                  </div>
              </div>
          @endforeach
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
