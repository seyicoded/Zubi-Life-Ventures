@extends('layout.app')

@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
            <h1>Zubic Life Link Save And Buy Ventures<span>.</span></h1>
            <h2>We are team of professional investors</h2>
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
          <form>
              <div class="form-group">
                <label for="email">Username/E-mail</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail Address" aria-describedby="email" required>
                <small id="email" class="text-muted">E-mail</small>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Account Password" required>
                <small id="password" class="text-muted">Password</small>
              </div>
          </form>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
