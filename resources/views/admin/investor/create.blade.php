@extends('admin.layout.app')
@section('content')
    <div class="w3-container">
        <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">Create New Investor</h1>

        <form class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w3-container">
                <input class="w3-input" placeholder="Enter Category Name" value="C{{$data['a_id']}}" disabled required/>
                <label class="w3-validate w3-label">Worker Group</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="name" type="text" placeholder="Enter Investors Name" required/>
                <label class="w3-validate w3-label">Investors Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="email" type="email" placeholder="Enter Investors Email" required/>
                <label class="w3-validate w3-label">Investors Email</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="phone" type="tel" placeholder="Enter Investors Phone" required/>
                <label class="w3-validate w3-label">Investors Phone</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input form-control" name="password" type="password" placeholder="Enter Investors Password" required/>
                <label class="w3-validate w3-label">Investors Password</label>
            </div>
            <br />

            <div class="w3-container" style="display: flex; justify-content: flex-end;">
                <input class="w3-btn w3-blue" type="submit" value="Create"/>
            </div>
            <br />
        </form>
    </div>
@endsection
