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
                                <h4 class="nk-block-title page-title">Dashboard</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Sale</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">£ {{number_format($today_sale)}}</div>
                                                <span class="text-success mr-2">including delivery charge</span>
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
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_orders}}</div>
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
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Customers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_customers}}</div>
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
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-75">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Subscription</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_subscription}}</div>
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
                            <div class="col-xxl-4">
                                <div class="row g-gs">
                                    <div class="col-xxl-4 col-lg-6">
                                        <div class="card h-100">
                                            <div class="nk-ecwg nk-ecwg5">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start pb-3 g-2">
                                                        <div class="card-title">
                                                            <h6 class="title">Monthly Report</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help" data-toggle="tooltip" data-placement="left" title="Users of this month"></em>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div id="chart_div"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    <div class="col-xxl-12 col-md-6">
                                        <div class="card">
                                            <div class="nk-ecwg nk-ecwg3">
                                                <div class="card-inner pb-0">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Order Status</h6>
                                                        </div>
                                                    </div>
                                                    <div class="data">
                                                        <div class="data-group">
                                                            <span id="donutchart" style="width: 400px; height: 300px;"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            </div><!-- .nk-ecwg -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                            <div class="col-xxl-8" style="padding-top: 30px">
                                <div class="card card-full">
                                    <div class="nk-ecwg nk-ecwg8 h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-3">
                                                <div class="card-title">
                                                    <h6 class="title">Yearly Sales</h6>
                                                </div>
                                            </div>
                                            <div id="area_chart" style="width: 100%; height: 300px;"></div>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-8" style="padding-top: 30px">
                                <div class="card card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Stock out product list</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col"><span class="sub-text">Product name</span></th>
                                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Stock</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand name</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category name</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Quantity</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Image</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Approval</span></th>
                                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $key=>$product )
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">{{$product->product_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                @if($product->product_quantity >= 1)
                                                                    <span class="tb-status text-success">Available</span>
                                                                @else
                                                                    <span class="tb-status text-danger">Stock Out</span>
                                                                @endif
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{$product->brand_name}}</span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                                <span>{{$product->product_regular_price}}</span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{$product->category_name}}</span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span>{{$product->product_quantity}}</span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <img src="{{asset($product->product_thumbnail_image)}}" class="img-fluid" alt="" style="height: 20px; width: 20px;">
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                @if($product->product_approval == 'Approved')
                                                                    <span class="tb-status text-success">{{$product->product_approval}}</span>
                                                                @else
                                                                    <span class="tb-status text-danger">{{$product->product_approval}}</span>
                                                                @endif
                                                            </td>
                                                            @if($product->product_approval == 'Unapproved')
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                        <li><a href="#" class="disabled"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                                        <li><a href="{{route('stock.update',\Illuminate\Support\Facades\Crypt::encryptString($product->id))}}" class="disabled"><em class="icon ni ni-edit"></em><span>Stock Update</span></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            @else
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                        <li><a href="{{route('admin.stock.edit',\Illuminate\Support\Facades\Crypt::encryptString($product->id))}}" ><em class="icon ni ni-edit"></em><span>Stock Update</span></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            @endif
                                                        </tr><!-- .nk-tb-item  -->
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .card -->
                            </div>
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $chartData ?>
            ]);

            var options = {
                title: 'Total order Status Report',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        //column chart

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'orders'],
                <?php echo $monthly_orders ?>
            ]);

            var options = {
                title : 'Monthly Orders Report',
                vAxis: {title: 'Orders'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script>
        //Area chart

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Orders'],
                <?php echo $yearly_orders ?>
            ]);

            var options = {
                title: 'Yearly Orders Report',
                hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection
