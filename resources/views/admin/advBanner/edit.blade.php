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
                                        <form action="{{route('advertisement-banner.update', encrypt($banner->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="title" id="title" value="{{old('title', isset($banner)?$banner->banner_title:null)}}" placeholder="Enter Banner Title">
                                                            @error('title')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Slider Image Upload</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="image" multiple class="custom-file-input" value="{{old('image', isset($banner)?$banner->banner_image:null)}}">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($banner))
                                                <img src="{{asset($banner->banner_image)}}" width="150px;">
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
