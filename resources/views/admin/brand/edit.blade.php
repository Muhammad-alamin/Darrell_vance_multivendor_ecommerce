@extends('admin.layouts.master')

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
                                        <form action="{{route('Brand.update', encrypt($brands->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="brand_name" class="form-label">Shop Name</label>
                                                            <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{old('brand_name', isset($brands)?$brands->brand_name:null)}}" placeholder="Enter Shop name">
                                                            @error('brand_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="phone" class="form-label">Phone No</label>
                                                            <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone', isset($brands)?$brands->brand_phone:null)}}" placeholder="Enter Phone no">
                                                            @error('phone')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" class="form-control" name="address" id="address" value="{{old('address', isset($brands)?$brands->brand_address:null)}}" placeholder="Enter Address">
                                                            @error('address')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Upload Shop Logo</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" id="image" multiple class="custom-file-input" value="{{old('image', isset($brands)?$brands->brand_image:null)}}" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($brands))
                                                <img src="{{asset($brands->brand_image)}}" width="150px;">
                                            @endif

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Upload Shop Thumbnail Image</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="brand_thumbnail_image" id="brand_thumbnail_image" multiple class="custom-file-input"value="{{old('image', isset($brands)?$brands->brand_thumbnail_image:null)}}" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                @error('brand_thumbnail_image')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($brands))
                                                <img src="{{asset($brands->brand_thumbnail_image)}}" width="150px;">
                                            @endif
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
