@extends('admin.layout.app')
@section('content')
<div class="w3-container">
    <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">View Workers</h1>

    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable" id="table">
        <thead>
            <tr>
                <th>CODE</th>
                <th>Name</th>
                <th>User Name/Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $dt)
                <tr>
                    <td>C{{$dt->a_id}}</td>
                    <td>{{$dt->a_name}}</td>
                    <td>{{$dt->a_username}}</td>
                    <td>{{$dt->a_phone}}</td>
                    <td>{{date('Y-m-d',strtotime($dt->a_date))}}</td>
                    <td><button onclick="window.location.href = '{{url('/admin/edit-worker/'.$dt->a_id)}}' " class="btn btn-primary">Edit</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
