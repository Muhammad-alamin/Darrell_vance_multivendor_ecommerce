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
                                        <form action="{{route('delivery_charge.update', encrypt($deliveryCharge->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="name" class="form-label">Delivery Location</label>
                                                            <input type="text" class="form-control" name="delivery_location" id="title" value="{{old('delivery_location', isset($deliveryCharge)?$deliveryCharge->delivery_location:null)}}" placeholder="Enter Delivery Location">
                                                            @error('delivery_location')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="name" class="form-label">Delivery Amount</label>
                                                    <input type="text" class="form-control" name="delivery_amount" id="title" value="{{old('delivery_amount', isset($deliveryCharge)?$deliveryCharge->delivery_amount:null)}}" placeholder="Enter Delivery Amount">
                                                    @error('delivery_amount')<i class="text-danger">{{$message}}</i>@enderror
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
