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
                                <h4 class="nk-block-title page-title">Approve Withdrawl Request</h4>
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
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('admin.withdrawl.update', encrypt($withdraw->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="amount" class="form-label">Withdraw Amount</label>
                                                            <input type="number" class="form-control" name="amount" id="amount" disabled value="{{old('amount', isset($withdraw)?$withdraw->withdraw_amount:null)}}" placeholder="Amount you want to withdrawal">
                                                            @error('amount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="description" class="form-label">Seller Message</label>
                                                            <textarea id="description" type="text" class="form-control" disabled placeholder="Short Description" name="description" rows="4">{{old('vendor_message', isset($withdraw)?$withdraw->vendor_message:null)}}</textarea>
                                                            @error('description')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="transaction_id" class="form-label">Transaction ID</label>
                                                            <input type="text" class="form-control" name="transaction_id" id="transaction_id"  value="{{old('transaction_id', isset($withdraw)?$withdraw->transaction_id:null)}}" placeholder="Type Your Transaction ID">
                                                            @error('transaction_id')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="complete_date" class="form-label">Complete Date</label>
                                                            <input type="complete_date" id="transaction_complete_date" class="form-control" name="complete_date"  value="{{old('complete_date', isset($withdraw)?$withdraw->complete_date:null)}}" placeholder="Please Select Transaction Date">
                                                            @error('complete_date')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" name="status" id="status" data-search="on">
                                                                <option selected="" disabled="" >Select Status</option>
                                                                <option value="Pending" <?= $withdraw->status === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                                <option value="Processing" <?= $withdraw->status === 'Processing' ? 'selected' : '' ?>>Processing</option>
                                                                <option value="Canceled" <?= $withdraw->status === 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                                                                <option value="Complete" <?= $withdraw->status === 'Complete' ? 'selected' : '' ?>>Complete</option>
                                                            </select>
                                                            @error('status')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="admin_message" class="form-label">Admin Message</label>
                                                            <textarea id="admin_message" type="text" class="form-control"  placeholder="Short Description" name="admin_message" rows="4">{{old('vendor_message', isset($withdraw)?$withdraw->admin_message:null)}}</textarea>
                                                            @error('admin_message')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Approve</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>

                            @if (isset($withdraw))

                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">SELLER WILL RECEIVE MONEY THROUGH THE INFORMATION BELOW:</div>
                                    @if (isset($withdraw->card_number))
                                    <div class="card-inner"><table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Card Number:</th>
                                            <td>{{ $withdraw->card_number }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    @else
                                    <div class="card-inner"><table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Bank Name:</th>
                                            <td>{{ $withdraw->bank_name }}</td>
                                            <th scope="row">Branch Name:</th>
                                            <td>{{ $withdraw->branch_name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Account Number:</th>
                                            <td>{{ $withdraw->account_number }}</td>
                                            <th scope="row">Account Holder Name:</th>
                                            <td>{{ $withdraw->account_holder_name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Routing Number:</th>
                                            <td>{{ $withdraw->routing_number }}</td>
                                            <th scope="row">Description:</th>
                                            <td>{{ $withdraw->description }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif

                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
