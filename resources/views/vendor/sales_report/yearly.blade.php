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
                                    <h4 class="nk-block-title">Yearly Report</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            <!-- /.content-header -->
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-10 mb-2">
                                                <select class="form-control" name="yearly_report" id="yearly_report">
                                                    <option selected="" disabled="" >Select Year</option>
                                                    <option  value="2017">2017</option>
                                                    <option  value="2018">2018</option>
                                                    <option  value="2019">2019</option>
                                                    <option  value="2020">2020</option>
                                                    <option  value="2021">2021</option>
                                                    <option  value="2022">2022</option>
                                                    <option  value="2023">2023</option>
                                                    <option  value="2024">2024</option>
                                                    <option  value="2025">2025</option>
                                                    <option  value="2026">2026</option>
                                                    <option  value="2027">2027</option>
                                                    <option  value="2028">2028</option>
                                                    <option  value="2029">2029</option>
                                                    <option  value="2030">2030</option>
                                                    <option  value="2031">2031</option>
                                                    <option  value="2032">2032</option>
                                                    <option  value="2033">2033</option>
                                                    <option  value="2034">2034</option>
                                                    <option  value="2035">2035</option>
                                                    <option  value="2036">2036</option>
                                                    <option  value="2037">2037</option>
                                                    <option  value="2038">2038</option>
                                                    <option  value="2039">2039</option>
                                                    <option  value="2040">2040</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-lg-2 mb-2">
                                                <button type="submit" class="form-control btn btn-primary text-center">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Order id</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Customer name</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Address</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Phone</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$order)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->order_id}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                    <span>{{$order->full_name}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span>{{$order->address}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                    <span>{{$order->phone}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span>{{$order->status}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span class="tb-lead">{{number_format( $order->grand_total,2)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('vendor.order.show',\Illuminate\Support\Facades\Crypt::encryptString($order->id))}}"><em class="icon ni ni-edit"></em><span>Details</span></a></li>
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
