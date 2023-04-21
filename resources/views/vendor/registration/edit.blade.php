@extends('vendor.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('registration.update', $vendor->id)}}" method="post" class="gy-3">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{old('name', isset($vendor)?$vendor->name:null)}}" placeholder="Enter User Name">
                                                            @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{old('email', isset($vendor)?$vendor->email:null)}}" placeholder="Enter User Email">
                                                            @error('email')<i class="text-danger">{{$message}}</i>@enderror                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="email" class="form-label">Mobile No</label>
                                                            <input type="text" name="mobile" class="form-control form-control-lg" id="mobile" value="{{old('mobile', isset($vendor)?$vendor->mobile:null)}}" placeholder="Enter Your Valid Mobile No">
                                                            @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password">Password</label>
                                                        <div class="form-control-wrap">
                                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                            </a>
                                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter User password">
                                                            @error('password')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password">Confirm Password</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <div class="form-check">
                                                                <input type="radio" @if(old('status',isset($vendor)?$vendor->status:null)  == 'Active') checked @endif name="status" class="form-check-input" value="active" id="active">
                                                                <label  for="active">Active</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" @if(old('status',isset($vendor)?$vendor->status:null)  == 'Inactive') checked @endif name="status" class="form-check-input" value="inactive" id="inactive">
                                                                <label for="inactive">Inactive</label>
                                                            </div>
                                                            @error('status')<i class="text-danger">{{ $message }}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
