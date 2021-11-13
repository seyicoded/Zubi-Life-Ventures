@extends('admin.layout.app')
@section('content')
<div class="w3-container">
    <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">View Investors</h1>

    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable" id="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Code</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Group</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $dt)
                <tr>
                    <td>{{$dt->i_id}}</td>
                    <td>{{$dt->code}}</td>
                    <td>{{$dt->i_name}}</td>
                    <td>{{$dt->i_email}}</td>
                    <td>{{$dt->i_phone}}</td>
                    <td>{{(intval($dt->i_status) == 1) ? 'Active': 'In-Active'}}</td>
                    <td>C{{$dt->a_id}}</td>
                    <td>{{date('Y-m-d',strtotime($dt->date_updated))}}</td>
                    <td><button onclick="window.location.href = '{{url('/admin/edit-investor/'.$dt->i_id)}}' " class="btn btn-primary">Edit</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
