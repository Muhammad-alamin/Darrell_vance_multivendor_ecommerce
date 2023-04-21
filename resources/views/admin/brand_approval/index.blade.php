@extends('admin.layouts.master')

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
                                    <h4 class="nk-block-title">Brand Approval List</h4>
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
                                            <th class="nk-tb-col"><span class="sub-text">Brand Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Vendor Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Approval</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Address</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone no</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand Image</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brands as $key=>$brand )
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$brand->brand_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$brand->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                @if($brand->brand_approval == 'Approved')
                                                    <span class="tb-status text-success">{{$brand->brand_approval}}</span>
                                                @else
                                                    <span class="tb-status text-danger">{{$brand->brand_approval}}</span>
                                                @endif

                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{$brand->brand_address}}</span>
                                            </td>

                                            <td class="nk-tb-col tb-col-md">
                                                @if($brand->brand_status == 'Active')
                                                    <span class="tb-status text-success">{{$brand->brand_status}}</span>
                                                @else
                                                    <span class="tb-status text-danger">{{$brand->brand_status}}</span>
                                                @endif

                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span class="tb-amount">{{$brand->brand_phone}}<span class="currency"></span></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <img src="{{asset($brand->brand_image)}}" class="img-fluid" alt="" style="height: 40px; width: 40px;">
                                            </td>

                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('admin.brand.edit' , encrypt($brand->id))}}"><em class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                                    <li><a href="{{route('admin.brand.destroy', encrypt($brand->id))}}"  onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-trash-empty"></em><span>Delete</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
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
