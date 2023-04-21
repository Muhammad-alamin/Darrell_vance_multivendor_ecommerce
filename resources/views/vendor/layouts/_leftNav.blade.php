<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <br>
        <div class="nk-sidebar-brand">
            <a href="javascript:void(0)" class="logo-link nk-sidebar-logo">
                <img class="text-center" src="{{asset('assets/vendor_logo.png')}}" style="width: 180px">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('vendor.dashboard')}}" class="nk-menu-link" @if(request()->routeIs('admin.dashboard')) active @endif>
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                            <span class="nk-menu-text">Brand</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('brand.create')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Create Brand</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('brand.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Brand List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">Product</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('products.create')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Create Product</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('products.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Product List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-note-add-fill"></em></span>
                            <span class="nk-menu-text">Campaign</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.campaign.list')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Campaign list</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.campaign.allProduct')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Product List</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('campaign.product.list')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Campaign Product List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('stock.product')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-folder-fill"></em></span>
                            <span class="nk-menu-text">Stock Management</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('vendor.order.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Orders</span>
                        </a>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-report-fill"></em></span>
                            <span class="nk-menu-text">Sales Report</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.daily.report')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Daily Report</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.monthly.report')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Monthly Report</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.yearly.report')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Yearly Report</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                            <span class="nk-menu-text">Withdraw</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.payout.info')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Pay out info</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.monthly.report')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"></span>
                                    <span class="nk-menu-text">Withdraw request</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-user-add-fill"></em></span>
                            <span class="nk-menu-text">Contact</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('vendor.customerMessage')}}" class="nk-menu-link @if(request()->routeIs('vendor.customerMessage'))  active @endif"><span class="nk-menu-text">Customer Messages</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->

