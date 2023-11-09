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
                            @if (isset($account_info))

                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">Account Info</div>
                                    @if (isset($account_info->card_number))
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Card Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->card_number }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @else
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Bank Name:</span>
                                                        <span class="profile-ud-value">{{ $account_info->bank_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Branch Name:</span>
                                                        <span class="profile-ud-value">{{ $account_info->branch_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->account_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Holder Name:</span>
                                                        <span class="profile-ud-value">{{ $account_info->account_holder_name }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Routing Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->routing_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Description:</span>
                                                        <span class="profile-ud-value">{{ $account_info->description }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif


                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('bank_info.update', encrypt($account_info->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                                @csrf
                                                @if (isset($account_info->card_number))

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="bank_info_paypal_id">Card Number :</label>
                                                        <input id="bank_info_paypal_id" type="text" class="form-control" placeholder="Card Number" name="card_number"  value="{{old('card_number', isset($account_info)?$account_info->card_number:null)}}">
                                                    </div>
                                                </div>
                                                @else

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="bank_info_name">Bank Name:</label>
                                                        <input id="bank_info_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name"  value="{{old('bank_name', isset($account_info)?$account_info->bank_name:null)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_info_code">Branch Name:</label>
                                                        <input id="bank_info_code" type="text" class="form-control" name="branch_name" placeholder="Barnch name"  value="{{old('branch_name', isset($account_info)?$account_info->branch_name:null)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_info_number">Account Number:</label>
                                                        <input id="bank_info_number" type="text" class="form-control" placeholder="Bank Account number" name="account_number"  value="{{old('account_number', isset($account_info)?$account_info->account_number:null)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_info_full_name">Account Holder Name:</label>
                                                        <input id="bank_info_full_name" type="text" class="form-control" placeholder="Full name" name="account_holder_name"  value="{{old('account_holder_name', isset($account_info)?$account_info->account_holder_name:null)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_info_upi_id">Routing Number:</label>
                                                        <input id="bank_info_upi_id" type="text" class="form-control" placeholder="Routing Number" name="routing_number"  value="{{old('routing_number', isset($account_info)?$account_info->routing_number:null)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_info_description">Description:</label>
                                                        <textarea id="bank_info_description" type="text" class="form-control" placeholder="Description" name="description"  rows="4">{{old('description', isset($account_info)?$account_info->description:null)}}</textarea>
                                                    </div>
                                                </div>
                                                @endif
                                            <div class="form-group text-center">
                                                <div class="form-group submit">
                                                    <div class="ps-form__submit text-center">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update info</button>
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
