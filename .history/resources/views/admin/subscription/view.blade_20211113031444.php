@extends('admin.layout.app')
@section('content')
<div class="w3-container">
    <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">View Subscription Under Clicked Investor</h1>

    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable" id="table">
        <thead>
            <tr>
                <th>Tnx Ref</th>
                <th>Package Name</th>
                <th>Duration (Days)</th>
                <th>Duration Paid (Days)</th>
                <th>Cost per Day</th>
                <th>Card Last Four Digit</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['db'] as $dt)
                <tr>
                    <td>{{$dt->tnx_ref}}</td>
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
                    <td><button type="button" class="btn btn-danger" onclick="window.location.href= '{{url('/cancel-subscription')}}?trxref={{$dt->tnx_ref}}'">Cancel Subscription</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
