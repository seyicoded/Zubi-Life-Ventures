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
                                <?php
                                    $o_im = DB::select('SELECT * from package_other_images where p_id = ?', [$dt->p_id]);
                                    $count = 1;
                                ?>
                              <ol class="carousel-indicators">
                                  <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                  @foreach ($o_im as $ddd)
                                    <li data-target="#carouselId" data-slide-to="{{$count}}"></li>
                                    <?php $count++;?>
                                  @endforeach
                              </ol>
                              <div class="carousel-inner" role="listbox">
                                  <div class="carousel-item active">
                                      <img src="{{url('auto_images/packages/'.$dt->p_image)}}" style="height: 300px" alt="slide">
                                  </div>
                                  @foreach ($o_im as $image)
                                    <div class="carousel-item">
                                        <img src="{{url('auto_images/packages_other/'.$image->images)}}" style="height: 300px" alt="slide">
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
                      <div class="w3-col s12 m12 l6">
                          <div style="display: flex; flex-direction: column; flex: 1">

                          </div>
                          {{-- content --}}
                          <h3 class="w3-center">INVESTMENT PACKAGE: <span style="font-weight: bold">{{$dt->p_name}}</span></h3>
                          <small style="margin-top: 15px">DESCRIPTION: <span style="font-weight: bold">{{$dt->p_desc}}</span></small> <br /><br />
                          <small style="margin-top: 15px">DURATION: <span style="font-weight: bold">{{$dt->duration}} days</span></small> <br /><br />
                          <small style="margin-top: 15px">AMOUNT: <span style="font-weight: bold">{{$dt->currency.number_format($dt->amount_one)}} per day</span></small>

                          <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block">INVEST NOW</button>
                      </div>
                  </div>
              </div>
          @endforeach
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
