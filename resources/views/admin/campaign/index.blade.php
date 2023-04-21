
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
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">End Date</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Discount</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($campaigns as $key=>$campaign)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$campaign->title}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-lead">{{$campaign->start_date}}</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col tb-col-mb">
                                                <span class="tb-lead">{{$campaign->end_date}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                @if($campaign->status == 'Active')
                                                    <span class="tb-lead text-success">{{$campaign->status}}</span>
                                                @else
                                                    <span class="tb-lead text-danger">{{$campaign->status}}</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span class="tb-lead">{{$campaign->discount}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <img src="{{asset($campaign->image)}}" style="height: 40px; width: 40px;"  >
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('campaign.edit' , encrypt($campaign->id))}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                    <li><a href="{{route('admin.campaign.delete', encrypt($campaign->id))}}"  onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
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
