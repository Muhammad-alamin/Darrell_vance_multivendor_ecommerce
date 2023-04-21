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
                                    <h4 class="nk-block-title">Campaign List</h4>
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
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Start Date</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">End date</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Discount</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text"></span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($campaigns as $key=>$campaign )
                                            <tr class="nk-tb-item">
                                                    <td class="nk-tb-col">
                                                        <div class="user-card">
                                                            <div class="user-info">
                                                                <span class="tb-lead">{{$campaign->title}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                        <span class="tb-amount">{{$campaign->start_date}}<span class="currency"></span></span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{$campaign->end_date}}</span>
                                                    </td>

                                                    <td class="nk-tb-col tb-col-md">
                                                        <img src="{{asset($campaign->image)}}" style="height: 40px; width: 40px;"  >
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{$campaign->discount}} %</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        @if($campaign->status == 'Active')
                                                            <span class="tb-lead text-success">{{$campaign->status}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        @else
                                                            <span class="tb-lead text-danger">{{$campaign->status}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        @endif
                                                    </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    @if($campaign->end_date < date('m-d-y'))
                                                    <td class="nk-tb-col">
                                                        <div class="user-card">
                                                            <div class="user-info">
                                                                <span class="tb-lead text-danger">Date Expire<span class="dot dot-success d-md-none ml-1"></span></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    </td>
                                                </tr><!-- .nk-tb-item  -->
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
