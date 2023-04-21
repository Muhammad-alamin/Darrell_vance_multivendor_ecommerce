@extends('vendor.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Campaign Product List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Expire Date</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Offer Price</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($campaignPro as $key=>$eachProduct)
                                            @if($eachProduct->status = 'Active')
                                                @if($eachProduct->end_date < date('m-d-Y'))
                                                    @else
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-info">
                                                                    <span class="tb-lead">{{$eachProduct->product_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-info">
                                                                    <span class="tb-lead">{{$eachProduct->end_date}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-info">
                                                                    @if($eachProduct->product_discount_price == null)
                                                                        <span class="tb-lead">{{number_format($eachProduct->product_regular_price * $eachProduct->discount /100)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    @else
                                                                        <span class="tb-lead">{{number_format($eachProduct->product_discount_price * $eachProduct->discount /100)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-info">
                                                                    @if($eachProduct->status == 'Active')
                                                                        <span class="tb-lead text-success">{{$eachProduct->status}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    @else
                                                                        <span class="tb-lead text-danger">{{$eachProduct->status}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr><!-- .nk-tb-item  -->
                                                @endif
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
