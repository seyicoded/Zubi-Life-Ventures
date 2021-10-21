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
                <th>Icon Name</th>
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
                    <td>{{$dt->route_name}}</td>
                    <td>{{$dt->icon_name}}</td>
                    <td>{{$dt->mini_desc}}</td>
                    <td>{{$dt->main_image}}</td>
                    <td>{{$dt->date}}</td>
                    <td>{{$dt->date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
