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
                                        <form action="{{route('sub-category.update', $subcategory->id)}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">

                                                    <div class="form-group">
                                                        <label for="category_id">Select Category</label>
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option value="category_id">Select Category</option>
                                                            @foreach($categories as $category)

                                                                <option @if(old('category_id',isset($subcategory)?$subcategory->category_id:null)  == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>

                                                            @endforeach
                                                        </select>

                                                        @error('category_id')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="subcat_name" class="form-label">Sub-Category Name</label>
                                                            <input type="text" class="form-control" name="subcat_name" id="subcat_name" value="{{old('subcat_name', isset($subcategory)?$subcategory->subcat_name:null)}}" placeholder="Enter sub-category name">
                                                            @error('subcat_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Image Upload</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" id="image" multiple class="custom-file-input" value="{{old('image', isset($subcategory)?$subcategory->subcate_image:null)}}" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($subcategory))
                                                <img src="{{asset($subcategory->subcate_image)}}" width="150px;">
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
