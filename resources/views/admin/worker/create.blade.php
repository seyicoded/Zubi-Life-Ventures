@extends('admin.layout.app')
@section('content')
    <div class="w3-container">
        <h1 class="w3-hover-text-blue w3-center" style="font-weight: bold">Create New Worker</h1>

        <form class="w3-content w3-card-4 w3-round w3-padding-24 w3-margin-top" style="width: 80%; padding-left: 3%; padding-right: 3%; background: rgba(255, 255, 255, 0.7)" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w3-container">
                <input class="w3-input" name="worker_name" type="text" placeholder="Enter Worker Name" required/>
                <label class="w3-validate w3-label">Worker Name</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="username" type="email" placeholder="Enter User Name" required/>
                <label class="w3-validate w3-label">User Name as Email</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="password" type="password" placeholder="Enter Password" required/>
                <label class="w3-validate w3-label">PassWord</label>
            </div>
            <br />

            <div class="w3-container">
                <input class="w3-input" name="phone" type="tel" placeholder="Enter Phone Number" required/>
                <label class="w3-validate w3-label">Phone Number</label>
            </div>
            <br />

            <div class="w3-container" style="display: flex; justify-content: flex-end;">
                <input class="w3-btn w3-blue" type="submit" value="Create"/>
            </div>
            <br />
        </form>
    </div>
@endsection
