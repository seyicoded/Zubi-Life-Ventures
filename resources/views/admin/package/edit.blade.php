@extends('admin.layout.app')
@section('content')
    <div class="w3-container">
        <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">Edit New Investment Package</h1>

        <form class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w3-container">
                <select name="cat" class="w3-select">
                    @foreach ($data['cat'] as $dt)
                        <option value="{{$dt->c_id}}" {{ ($dt->c_id == $data['data']->c_id) ? 'selected':'' }}>{{$dt->category_name}}</option>
                    @endforeach
                </select>
                <label class="w3-validate w3-label">Select Category for Package</label>
            </div>

            <div class="w3-container">
                <input class="w3-input" name="p_name" type="text" placeholder="Enter Package Name" value="{{$data['data']->p_name}}" required/>
                <label class="w3-validate w3-label">Investment Package Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="route_name" type="text" placeholder="Enter Route Name" value="{{$data['data']->p_route_name}}" required/>
                <label class="w3-validate w3-label">Route Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="duration" type="number" placeholder="Enter Duration for Investment in days" value="{{$data['data']->duration}}" required/>
                <label class="w3-validate w3-label">Enter Duration for Investment <small>e.g 30 for 30 days, 90 for 90 days, ...</small></label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="amount" type="number" placeholder="Enter Amount to daily Debit through runTime e.g 9000 for 9,000" value="{{$data['data']->amount_one}}" required/>
                <label class="w3-validate w3-label">Enter Amount to daily Debit through runTime. <b>Currency: NGN</b></label>
            </div>
            <br />

            <div class="w3-container">
                <textarea class="w3-input" name="mini_desc" placeholder="Enter Mini-Description for Package" required>{{$data['data']->p_desc}}</textarea>
                <label class="w3-validate w3-label">Mini-Description</label>
            </div>
            <br />

            <div class="w3-container">
                <h5>Old Image</h5>
                <img class="w3-card-4 w3-round" src="{{url('auto_images/packages'.'/'.$data['data']->p_image)}}" />
                <input class="w3-input" name="image" type="file" accept="image/*"/>
                <label class="w3-validate w3-label">Change Main Image <i>optional</i></label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="other_image" type="file" accept="image/*" multiple/>
                <label class="w3-validate w3-label">Add Other Images <i>optional</i></label>
            </div>
            <br />

            <div class="w3-container" style="display: flex; justify-content: flex-end;">
                <input class="w3-btn w3-blue" type="submit" value="Edit"/>
            </div>
            <br />
        </form>

        <style>
            .more-images{
                position: relative;
            }
            .more-images:hover{
                background: rgba(0, 0, 255, 0.4)
            }
            .more-images #close_{
                display: none
            }
            .more-images:hover #close_{
                display: inline;
                position: absolute;
                right: 5%;
                top: 1%;
                color: white;
                z-index: 99;
                font-size: 24px;
                padding: 5px;
                padding-top: 0px;
                cursor: pointer;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
            }
        </style>

        <div class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)">
            <div class="w3-row">
                @foreach ($data['others'] as $dt)
                    <div class="w3-col s6 m4 l3">
                        <div class="w3-margin w3-card-2 w3-round more-images" id='more-images'>
                            <a href="{{url('admin/delete-package-other-image/'.$dt->po_id)}}"><span id="close_" class="fas fa-close" style="z-index: 999">x</span></a>
                            <img class="w3-card-4 w3-round" src="{{url('auto_images/packages_other'.'/'.$dt->images)}}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
