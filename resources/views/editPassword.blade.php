@extends('homeTemplate')

@section('title')
<title>Maiboutique - Edit Password</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        <div class="card shadow-sm" style="width: 36vw;">
            <div class="card-body">
                <form action="/profile/edit-password/processing" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-center">
                        <h2>Update Password</h2>
                    </div>

                    <div class="mb-3">
                        <a href="/profile" class="btn btn-outline-danger" style="width: 6vw;">Back</a>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="oldPassword" id="inputOldPassword">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="newPassword" id="inputNewPassword" placeholder="5-20 characters">
                    </div>

                    <button type="submit" class="btn btn-success" style="width: 100%;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
