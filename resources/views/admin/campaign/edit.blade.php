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
                                        <form action="{{route('campaign.update',encrypt($campaign->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="title" class="form-label">Campaign Title</label>
                                                            <input type="text" class="form-control" name="title" id="title" value="{{old('title', isset($campaign)?$campaign->title:null)}}" placeholder="Enter Campaign Title">
                                                            @error('title')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="title" class="form-label">Start Date</label>
                                                            <input type="text" class="form-control" name="start_date" id="campaignStartDatepicker" value="{{old('start_date', isset($campaign)?$campaign->start_date:null)}}" placeholder="Enter Campaign start date">
                                                            @error('start_date')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="title" class="form-label">End Date</label>
                                                            <input type="text" class="form-control" name="end_date" id="campaignEndDatepicker" value="{{old('end_date', isset($campaign)?$campaign->end_date:null)}}" placeholder="Enter Campaign end date">
                                                            @error('end_date')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="title" class="form-label">Discount</label>
                                                            <input type="number" class="form-control" name="discount" id="discount" value="{{old('discount', isset($campaign)?$campaign->discount:null)}}" min="1" max="100" placeholder="Enter Campaign Discount">
                                                            @error('discount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="product_status" class="form-label">Campaign Status</label>
                                                            <div class="form-check">
                                                                <input type="radio" name="campaign_status" class="form-check-input" @if(old('status',isset($campaign)?$campaign->status:null)  == 'Active') checked @endif value="Active" id="Active">
                                                                <label  for="active">Active</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" name="campaign_status" class="form-check-input" @if(old('status',isset($campaign)?$campaign->status:null)  == 'Inactive') checked @endif value="Inactive" id="Inactive">
                                                                <label for="inactive">Inactive</label>
                                                            </div>
                                                            @error('campaign_status')<i class="text-danger">{{ $message }}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Campaign Image Upload</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" id="image" multiple class="custom-file-input" value="{{old('discount', isset($campaign)?$campaign->discount:null)}}" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($campaign))
                                                <img src="{{asset($campaign->image)}}" width="150px;">
                                            @endif
                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">submit</button>
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
