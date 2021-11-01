@extends('admin.layout.app')
@section('content')
    <div class="w3-container">
        <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">Create New Investment Package</h1>

        <form class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w3-container">
                <select name="cat" class="w3-select">
                    @foreach ($data['cat'] as $dt)
                        <option value="{{$dt->c_id}}">{{$dt->category_name}}</option>
                    @endforeach
                </select>
                <label class="w3-validate w3-label">Select Category for Package</label>
            </div>

            <div class="w3-container">
                <input class="w3-input" name="p_name" type="text" placeholder="Enter Package Name" required/>
                <label class="w3-validate w3-label">Investment Package Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="route_name" type="text" placeholder="Enter Route Name" required/>
                <label class="w3-validate w3-label">Route Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="duration" type="number" placeholder="Enter Duration for Investment in days" required/>
                <label class="w3-validate w3-label">Enter Duration for Investment <small>e.g 30 for 30 days, 90 for 90 days, ...</small></label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="amount" type="number" placeholder="Enter Amount to daily Debit through runTime e.g 9000 for 9,000" required/>
                <label class="w3-validate w3-label">Enter Amount to daily Debit through runTime. <b>Currency: NGN</b></label>
            </div>
            <br />

            <div class="w3-container">
                <textarea class="w3-input" name="mini_desc" placeholder="Enter Mini-Description for Package" required></textarea>
                <label class="w3-validate w3-label">Mini-Description</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="image" type="file" accept="image/*" required/>
                <label class="w3-validate w3-label">Main Image</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="other_image" type="file" accept="image/*" multiple required/>
                <label class="w3-validate w3-label">Other Images</label>
            </div>
            <br />

            <div class="w3-container" style="display: flex; justify-content: flex-end;">
                <input class="w3-btn w3-blue" type="submit" value="Create"/>
            </div>
            <br />
        </form>
    </div>
@endsection
