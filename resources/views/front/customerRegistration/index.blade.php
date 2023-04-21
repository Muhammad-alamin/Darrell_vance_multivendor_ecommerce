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
                                    <h4 class="nk-block-title">Vendor List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Edit</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Delete</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vendorLists as $key=>$vendorList )
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$vendorList->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                <span class="tb-amount">{{$vendorList->email}}<span class="currency"></span></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{$vendorList->mobile}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($vendorList->status == 'Active')
                                                <span class="tb-status text-success">{{$vendorList->status}}</span>
                                                @else
                                                    <span class="tb-status text-danger">{{$vendorList->status}}</span>
                                                @endif

                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <div>
                                                    <a href="{{route('registration.edit' , $vendorList->id)}}" class=" btn btn-gray btn btn-xs"><em class=" note-icon"></em>Edit</a>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <form action="{{route('registration.destroy', $vendorList->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                        <button class=" btn btn-danger btn btn-xs" onclick="return confirm('Are You Confirm to Delete?')">Delete</button>
                                                </form>
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
