@extends('admin.layout.app')
@section('content')
<div class="w3-container">
    <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">View Investment Packages</h1>

    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable" id="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Package Name</th>
                <th>Category Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Mini Desc</th>
                <th>Image</th>
                <th>Date</th>
                <th>Status</th>
                <th>Attion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $dt)
                <tr>
                    <td>{{$dt->p_id}}</td>
                    <td>{{$dt->p_name}}</td>
                    <td>{{$dt->category_name}}</td>
                    <td>{{$dt->currency.number_format($dt->amount_one)}}</td>
                    <td>{{$dt->duration}}</td>
                    <td class="w3-small">{{$dt->p_desc}}</td>
                    <td><img class="thumbnail w3-circle" src="{{url('auto_images/packages').'/'.$dt->p_image}}" /></td>
                    <td>{{date('Y-m-d',strtotime($dt->date_updated))}}</td>
                    <td>{{(intval($dt->status) == 1) ? 'Active':'In-Active'}}</td>
                    <td><button onclick="window.location.href = '{{url('/admin/edit-package/'.$dt->p_id)}}' " class="btn btn-primary">Edit</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
