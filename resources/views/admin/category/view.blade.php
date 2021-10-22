@extends('admin.layout.app')
@section('content')
<div class="w3-container">
    <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">View Investment Category</h1>

    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable" id="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Category Name</th>
                <th>Route Name</th>
                <th>Icon</th>
                <th>Mini Desc</th>
                <th>Image</th>
                <th>Date</th>
                <th>Attion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $dt)
                <tr>
                    <td>{{$dt->c_id}}</td>
                    <td>{{$dt->category_name}}</td>
                    <td>/{{$dt->route_name}}</td>
                    <td><i class="{{$dt->icon_name}}"></i></td>
                    <td class="w3-small">{{$dt->mini_desc}}</td>
                    <td><img class="thumbnail w3-circle" src="{{url('auto_images/category').'/'.$dt->main_image}}" /></td>
                    <td>{{date('Y-m-d',strtotime($dt->date))}}</td>
                    <td><button onclick="window.location.href = '{{url('/admin/edit-category/'.$dt->c_id)}}' " class="btn btn-primary">Edit</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
