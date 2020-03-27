@extends('layouts.admin')
@section('title','Add User')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Add User</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{ route('users') }}">Users</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="m-t-30" method="POST" action="{{ route('users.add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-12">
                                        <label>PHOTO</label>
                                        <input type="file" id="input-file-now-custom-2" name="image" value="{{ old('image')}}" class="dropify" data-height="300" />
                                        @error('image')
                                            <p class="text-danger text-center">{{ $message }}</p>
                                        @enderror
                                        <p class="mt-2 text-center">Image must be square and at least 500x500 pixels</p>
                                    </div>
                                    <div class="col-lg-9 col-12">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <h4>Personal Information</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-12 form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control @error('first_name') input-error @enderror" placeholder="Enter first name" value="{{ old('first_name') }}" required>
                                                @error('first_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control @error('last_name') input-error @enderror" placeholder="Enter last name" value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-12 form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control @error('email') input-error @enderror" placeholder="Enter email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                             <div class="col-lg-6 col-12 form-group">
                                                <label>Contact Number</label>
                                                <input type="text" name="contact_number" class="form-control @error('contact_number') input-error @enderror" placeholder="Enter contact number" value="{{ old('contact_number') }}" required>
                                                @error('contact_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <label>Default Password</label>
                                                <input type="text" name="password" class="form-control" value="password123" readonly>
                                            </div>
                                            <div class="col-12 form-group text-right">
                                                <a href="{{ route('users') }}">
                                                    <button type="button" class="btn btn-danger">
                                                        Cancel
                                                    </button>
                                                </a>
                                                <button type="submit" class="btn btn-info">
                                                    <i class="mdi mdi-content-save"></i> Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('dashboard.partials.footer')
       
    </div>
    
@endsection