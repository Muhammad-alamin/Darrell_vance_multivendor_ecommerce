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
                                    <h4 class="nk-block-title">Banner List</h4>
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
                            @elseif(Session::has('warning'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('warning') }}</strong>
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
                                            <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($banners as $key=>$banner)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$banner->banner_title}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <img src="{{asset($banner->banner_image)}}" class="img-fluid" alt="" style="height: 40px; width: 40px;"  >
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('advertisement-banner.edit',encrypt($banner->id))}}"><em class="icon ni ni-edit"></em><span>Edit Banner</span></a></li>
                                                                    <li><a href="{{route('advertisement-banner.delete',encrypt($banner->id))}}" onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-trash"></em><span>Remove Banner</span></a></li>
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
