@extends('layout.app')

@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>My Investments<span>.</span></h1>
          <h2>records</h2>

          <br />
        <a name="" id="" class="btn btn-warning" href="#main" role="button">VIEW RECORDS</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Investments</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Investments</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <table class="table table-striped table-hover table-inverse" style="width: 100%">
            <thead class="thead-inverse">
                <tr>
                    <th>Tnx Ref</th>
                    <th>Package Name</th>
                    <th>Duration</th>
                    <th>Duration Remaining</th>
                    <th>Cost per Day</th>
                    <th>Card Last Four Digit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        <tr>
                            <td scope="row">{{$dt->tnx_ref}} (paystack)</td>
                            <td><?php echo DB::select('SELECT * from packages where p_id = ?', [$dt->p_id])[0]->p_name;?></td>
                            <td>qq</td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
