@extends('admin.layouts.master')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Withdraw Details</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-header">Total Earnings</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">$ {{ $total_earning }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-gray">
                                    <div class="card-header">Available Balance</div>
                                    <div class="card-inner">
                                        @if (isset($total_withdraw))
                                        <h5 class="card-title">$ {{ $total_earning -  $total_withdraw}}</h5>
                                        @else
                                        <h5 class="card-title">$ {{ $total_earning }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-danger">
                                    <div class="card-header">Total Withdrawl</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">$ {{ $total_withdraw }}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">Withdrawl Details Info:</div>
                                    @if (isset($withdrawRequest->card_number))
                                    <div class="card-inner"><table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Card Number:</th>
                                            <td>{{ $withdrawRequest->card_number }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Transection ID:</th>
                                            <td>{{ $withdrawRequest->transaction_id }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Withdraw Amount:</th>
                                            <td>{{ $withdrawRequest->withdraw_amount }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Transaction Complete Date:</th>
                                            <td>{{ $withdrawRequest->complete_date }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Your Message:</th>
                                            <td>{{ $withdrawRequest->vendor_message }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Admin Message:</th>
                                            <td>{{ $withdrawRequest->admin_message }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Status:</th>
                                            @if ($withdrawRequest->status == 'Pending')
                                                <td class="badge rounded-pill text-white bg-warning">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Processing')
                                                <td class="badge rounded-pill text-white bg-secondary">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Canceled')
                                                <td class="badge rounded-pill text-white bg-danger">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Complete')
                                                <td class="badge rounded-pill text-white bg-success">{{$withdrawRequest->status}}</td>
                                            @endif
                                          </tr>
                                          <tr>
                                            <th scope="row">Withdraw Request Date:</th>
                                            <td>{{date('Y-m-d',strtotime($withdrawRequest->created_at))}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    @else
                                    <div class="card-inner"><table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Bank Name:</th>
                                            <td>{{ $withdrawRequest->bank_name }}</td>
                                            <th scope="row">Branch Name:</th>
                                            <td>{{ $withdrawRequest->branch_name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Account Number:</th>
                                            <td>{{ $withdrawRequest->account_number }}</td>
                                            <th scope="row">Account Holder Name:</th>
                                            <td>{{ $withdrawRequest->account_holder_name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Routing Number:</th>
                                            <td>{{ $withdrawRequest->routing_number }}</td>
                                            <th scope="row">Description:</th>
                                            <td>{{ $withdrawRequest->description }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Transection ID:</th>
                                            <td>{{ $withdrawRequest->transaction_id }}</td>
                                            <th scope="row">Withdraw Amount:</th>
                                            <td>{{ $withdrawRequest->withdraw_amount }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Transaction Complete Date:</th>
                                            <td>{{ $withdrawRequest->complete_date }}</td>
                                            <th scope="row">Your Message:</th>
                                            <td>{{ $withdrawRequest->vendor_message }}</td>
                                          </tr>
                                          <tr>
                                          <tr>
                                            <th scope="row">Admin Message:</th>
                                            <td>{{ $withdrawRequest->admin_message }}</td>

                                            <th scope="row">Status:</th>
                                            @if ($withdrawRequest->status == 'Pending')
                                                <td class="badge rounded-pill text-white bg-warning">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Processing')
                                                <td class="badge rounded-pill text-white bg-secondary">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Canceled')
                                                <td class="badge rounded-pill text-white bg-danger">{{$withdrawRequest->status}}</td>
                                                @elseif ($withdrawRequest->status == 'Complete')
                                                <td class="badge rounded-pill text-white bg-success">{{$withdrawRequest->status}}</td>
                                                @endif
                                          </tr>
                                          <tr>
                                            <th scope="row">Withdraw Request Date:</th>
                                            <td>{{date('Y-m-d',strtotime($withdrawRequest->created_at))}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
