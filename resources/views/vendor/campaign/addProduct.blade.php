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
                                        <form action="{{route('addProduct.campaign')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Select Campaign</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-06" name="addCampaign" id="addCampaign">
                                                                    <option selected="" disabled="" >Select Campaign</option>
                                                                    @foreach($campaigns as $key=>$campaign)
                                                                        @if($campaign->end_date < date('m-d-y'))

                                                                        @else
                                                                        <option  value="{{$campaign->id}}">{{$campaign->title}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @error('addCampaign')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
                                            <input type="hidden" value="{{$product->user_id}}" name="user_id">
                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Add</button>
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

