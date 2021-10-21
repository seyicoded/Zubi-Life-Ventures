@extends('admin.layout.app')
@section('content')
    <div class="w3-container">
        <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">Create New Investment Category</h1>

        <form class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w3-container">
                <input class="w3-input" name="cat_name" type="text" placeholder="Enter Category Name" required/>
                <label class="w3-validate w3-label">Investment Category Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="route_name" type="text" placeholder="Enter Route Name" required/>
                <label class="w3-validate w3-label">Route Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="icon_name" type="text" placeholder="Enter Icon Name" required/>
                <label class="w3-validate w3-label">Icon Name</label>
            </div>
            <br />

            <div class="w3-container">
                <textarea class="w3-input" name="mini_desc" placeholder="Enter Mini-Description for Category" required></textarea>
                <label class="w3-validate w3-label">Mini-Description</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="image" type="file" accept="image/*" required/>
                <label class="w3-validate w3-label">Main Image</label>
            </div>
            <br />

            <div class="w3-container" style="display: flex; justify-content: flex-end;">
                <input class="w3-btn w3-blue" type="submit" value="Create"/>
            </div>
            <br />
        </form>
    </div>
@endsection
