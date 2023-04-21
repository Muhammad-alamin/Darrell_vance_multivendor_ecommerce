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
                                    <h4 class="nk-block-title">Subscriber List</h4>
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
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Customer Name</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone No</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Subject</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Description</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customerMessage as $key=>$customerMessage )
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-status">{{$customerMessage->customer_name}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status">{{$customerMessage->customer_email}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status">{{$customerMessage->customer_phone}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-status" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{{$customerMessage->subject}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span class="tb-status" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{{$customerMessage->description}}</span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('sendMessage.customer',encrypt($customerMessage->id))}}"><em class="icon ni ni-eye"></em><span>Send message</span></a></li>
                                                                        <li><a href="{{route('customerMessage.details',encrypt($customerMessage->id))}}"><em class="icon ni ni-eye"></em><span>Details</span></a></li>
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
<script>
    import App from "../../../../public/js/app";
    export default {
        components: {App}
    }
</script>
