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
                                        <form action="{{route('category.update',encrypt($category->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="category_name" id="title" value="{{old('category_name', isset($category)?$category->category_name:null)}}" placeholder="Enter category name">
                                                            @error('category_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" @if(old('top_category',isset($category)?$category->top_category:null)  == 1 ) checked @endif name="top_category" class="form-check-input" value="1" id="top_category">
                                                            <label  for="top_brand">top_category</label>
                                                            @error('top_category')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" @if(old('display_homepage',isset($category)?$category->display_homepage:null)  == 1 ) checked @endif name="display_homepage" class="form-check-input" value="1" id="display_homepage">
                                                            <label  for="display_homepage">Display homepage</label>
                                                            @error('display_homepage')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Category Image Upload</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="image" multiple class="custom-file-input" value="{{old('image', isset($category)?$category->category_image:null)}}">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($category))
                                                <img src="{{asset($category->category_image)}}" width="150px;">
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
