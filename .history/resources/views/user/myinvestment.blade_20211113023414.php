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
          <marquee>if payment was sucess and it's hasn't reflected, action would then have a requery button, so click it</marquee>
        <table class="table table-striped table-hover table-inverse" style="width: 100%">
            <thead class="thead-inverse">
                <tr>
                    <th>Tnx Ref</th>
                    <th>Package Name</th>
                    <th>Duration</th>
                    <th>Duration Paid</th>
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
                            <td>{{$dt->duration_count}}</td>
                            <td>{{$dt->duration_paid}}</td>
                            <td>{{$dt->amount_to_pay}}</td>
                            <td>{{$dt->last_four_card_numb}}</td>
                            <td>{{(intval($dt->status) == 0) ? 'Pending Start Payment': ((intval($dt->status) == 1) ? 'Payment On-going': ((intval($dt->status) == 2) ? 'Completed': 'Aborted'))}}</td>
                            <td>
                                @switch(intval($dt->status))
                                    @case(0)
                                        <button type="button" class="btn btn-primary" onclick="window.location.href= '{{url('/callback1')}}?trxref={{$dt->tnx_ref}}'">ReQuery Payment</button>
                                        @break

                                    @case(1)
                                        <button type="button" class="btn btn-primary" onclick="window.location.href= '{{url('/trigger-autocharge')}}?ip_id={{$dt->ip_id}}'">Trigger Day AutoPay</button>
                                        @break

                                    @default
                                    <button type="button" class="btn btn-primary btn-disabled" disabled>Not Available</button>

                                @endswitch
                            </td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
