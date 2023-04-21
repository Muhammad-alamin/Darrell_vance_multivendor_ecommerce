@extends('vendor.layouts.master')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Pay out info</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Earning</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$1200</div>
                                                {{-- <span class="text-success mr-2">including delivery charge</span> --}}
                                                <div class="mt-2 mb-0 text-muted text-xs">
                                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Withdraw</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$1500</div>
                                                <div class="mt-2 mb-0 text-muted text-xs">
                                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-inner">
                                            <form action="{{route('brand.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="ps-form__content">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Payment Method: </label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control" id="default-06" name="payout_payment_method" id="addCampaign">
                                                                                <option value="bank_transfer" selected="selected">Bank Transfer</option>
                                                                                <option value="paypal">Card</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    <div id="payout-payment-bank_transfer" class="payout-payment-wrapper">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="bank_info_name">Bank Name:</label>
                                                            <input id="bank_info_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bank_info_code">Branch Name:</label>
                                                            <input id="bank_info_code" type="text" class="form-control" name="branch_name" placeholder="Barnch name" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bank_info_number">Account Number:</label>
                                                            <input id="bank_info_number" type="text" class="form-control" placeholder="Bank Account number" name="account_number" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bank_info_full_name">Account Holder Name:</label>
                                                            <input id="bank_info_full_name" type="text" class="form-control" placeholder="Full name" name="account_number" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bank_info_upi_id">Routing Number:</label>
                                                            <input id="bank_info_upi_id" type="text" class="form-control" placeholder="Routing Number" name="routing_number" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bank_info_description">Description:</label>
                                                            <textarea id="bank_info_description" type="text" class="form-control" placeholder="Description" name="description" rows="4"></textarea>
                                                        </div>
                                                    </div>

                                                    <div id="payout-payment-paypal" class="payout-payment-wrapper  d-none ">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="bank_info_paypal_id">Card Number :</label>
                                                            <input id="bank_info_paypal_id" type="text" class="form-control" placeholder="Card Number" name="card_number" value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center">
                                                    <div class="form-group submit">
                                                        <div class="ps-form__submit text-center">
                                                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- card -->
                            </div>
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
