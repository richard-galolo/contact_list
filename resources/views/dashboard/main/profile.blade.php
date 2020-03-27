@extends('layouts.admin')
@section('title','Profile')
@section('styles')
    <link href="{{ asset('admin_dashboard/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Profile</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h4 class="page-title mt-2">
                        <i class="mdi mdi-account-circle"></i>
                        My Profile
                    </h4>                
                </div>
                <div class="col-12">
                    <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    @if(isset(\Auth::user()->image))
                                        <img src="{{ asset('uploads/'.$user->image) }}" class="rounded-circle profile_image" width="150" height="150"/>
                                    @else
                                        <img src="{{ asset('admin_dashboard/img/default.png') }}" alt="user" class="rounded-circle img-fluid profile_image" width="150" height="150">
                                    @endif
                                    <h4 class="card-title m-t-10">{{ ucwords($user->first_name.' '.$user->last_name) }}</h4>
                                    <h6 class="card-subtitle">{{ strtoupper($user->usertype) }}</h6>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small>
                                <h6>
                                    {{ $user->email }}
                                </h6> 
                                <small class="text-muted p-t-30 db">Contact Number</small>
                                <h6>{{ $user->contact_number }}</h6> 
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{ $user->address }}</h6>
                                <div class="map-box">
                                    <iframe src="https://maps.google.com/maps?q={{ $user->address }}&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#personal_information" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        Personal Infomation
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#change_password" role="tab" aria-controls="pills-setting" aria-selected="false">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="personal_information" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-12 form-group">
                                                    <label>Photo</label>
                                                    <input type="file" name="image" id="image" class="form-control form-control-line">
                                                </div>
                                                <div class="col-lg-6 col-12 form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="Enter first name" class="form-control form-control-line" required>
                                                </div>
                                                <div class="col-lg-6 col-12 form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Enter last name" class="form-control form-control-line" required>
                                                </div>
                                                <div class="col-lg-6 col-12 form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}" placeholder="Enter contact number" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-lg-12 form-group">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fa fa-save"></i> Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form method="POST" class="form-horizontal form-material">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-12 form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" name="old_password" placeholder="Enter old password" class="form-control form-control-line">
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_password" placeholder="Enter new password" class="form-control form-control-line">
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="confirm_password" placeholder="Enter confirn new password" class="form-control form-control-line">
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <button type="button" class="btn btn-info float-right">
                                                        <i class="fa fa-save"></i> Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials.footer')
        
    </div>
    
@endsection

@push('scripts')

    <script type="text/javascript">
        // form submit
        $('form').submit( function(e){
            e.preventDefault();

            let form = new FormData(this);
            let url = '{{ route('profile.update')}}';
            $.ajax({
                url: url,
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        buttons: false,
                        timer: 1500
                    });
                },
                error: function(error){
                  console.log(error);
                },
            });
        });

        // image upload preview
        $("#image").change(function(){
            previewImage(this);
        });
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('.profile_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush