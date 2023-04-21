@extends('admin.layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')


    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Product / <strong class="text-primary small">Attributes</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('admin.product.approval')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('admin.product.approval')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                        <br>
                        @if(session('error'))
                            <div class=" alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class=" alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    </div><!-- .nk-block-head -->
                    <div class="profile-ud-list">
                        <div class="profile-ud-item">
                            <div class="profile-ud wider">
                                <span class="profile-ud-label">Product name</span>
                                <span >{{$product->product_name}}</span>
                            </div>
                            <div class="profile-ud wider">
                                <span class="profile-ud-label">Product Code</span>
                                <span >{{$product->product_code}}</span>
                            </div>

                            <form action="{{route('admin.add.attributes',$product->id)}}" method="post" class="gy-3" enctype="multipart/form-data">
                                @csrf
                                <div class="field_wrapper">
                                    <div style="display: flex">
                                        <input type="text" name="product_sku[]"  value="" class="form-control" placeholder="SKU" style="width: 120px; margin-right: 5px;"/>
                                        <input type="text" name="product_colour[]"  value="" class="form-control" placeholder="Colour" style="width: 120px; margin-right: 5px;"/>
                                        <input type="text" name="product_size[]"  value="" class="form-control" placeholder="Size" style="width: 120px; margin-right: 5px;"/>
                                        <input type="text" name="product_price[]"  value="" class="form-control" placeholder="price" style="width: 120px; margin-right: 5px;"/>
                                        <input type="text" name="product_stock[]"  value="" class="form-control" placeholder="Stock" style="width: 120px; margin-right: 5px;"/>
                                        <a href="javascript:void(0);" class="add_button btn btn-success btn-sm" title="Add field">Add</a>
                                    </div>
                                </div>

                                <div class="profile-ud wider">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Add Attribute</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .profile-ud-list -->
                    <br>
                    <br>
                    <br>

                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Attributes / <strong class="text-primary small">list</strong></h3>
                    </div>
                    <br>
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Product SKU</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Product Colour</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Product Size</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Product Price</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Product Stock</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product['attributes'] as $key=>$attribute )
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <div class="user-card">
                                        <div class="user-info">
                                            <span class="tb-lead">{{$attribute->attributes_sku}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                    <span>{{$attribute->attributes_colour}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{$attribute->attributes_size}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                    <span>{{$attribute->attributes_price}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{$attribute->attributes_stock}}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('admin.edit.attributes',$attribute->id)}}"><em class="icon ni ni-edit"></em><span>Edit Attributes</span></a></li>
                                                        <li><a href="{{route('admin.delete.attributes', $attribute->id)}}" onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-eye"></em><span>Delete Product</span></a></li>

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
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
{{--                                <div class="card-content">--}}
{{--                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Add Attributes</span></a>--}}
{{--                                        </li>--}}
{{--                                    </ul><!-- .nav-tabs -->--}}
{{--                                    <div class="card-inner">--}}
{{--                                        <div class="nk-block">--}}
{{--                                            <div class="nk-block-head">--}}
{{--                                                <h5 class="title">Product Details</h5>--}}
{{--                                                <p></p>--}}
{{--                                            </div><!-- .nk-block-head -->--}}
{{--                                            <div class="profile-ud-list">--}}
{{--                                                <div class="profile-ud-item">--}}
{{--                                                    <div class="profile-ud wider">--}}
{{--                                                        <span class="profile-ud-label">Product name</span>--}}
{{--                                                        <span >{{$product->product_name}}</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="profile-ud wider">--}}
{{--                                                        <span class="profile-ud-label">Product Code</span>--}}
{{--                                                        <span >{{$product->product_code}}</span>--}}
{{--                                                    </div>--}}

{{--                                                    <form action="{{route('admin.add.attributes',$product->id)}}" method="post" class="gy-3" enctype="multipart/form-data">--}}
{{--                                                        @csrf--}}
{{--                                                        <div class="field_wrapper">--}}
{{--                                                            <div style="display: flex">--}}
{{--                                                                <input type="text" name="product_sku[]"  value="" class="form-control" placeholder="SKU" style="width: 120px; margin-right: 5px;"/>--}}
{{--                                                                <input type="text" name="product_colour[]"  value="" class="form-control" placeholder="Colour" style="width: 120px; margin-right: 5px;"/>--}}
{{--                                                                <input type="text" name="product_size[]"  value="" class="form-control" placeholder="Size" style="width: 120px; margin-right: 5px;"/>--}}
{{--                                                                <input type="text" name="product_price[]"  value="" class="form-control" placeholder="price" style="width: 120px; margin-right: 5px;"/>--}}
{{--                                                                <input type="text" name="product_stock[]"  value="" class="form-control" placeholder="Stock" style="width: 120px; margin-right: 5px;"/>--}}
{{--                                                                <a href="javascript:void(0);" class="add_button btn btn-success btn-sm" title="Add field">Add</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="profile-ud wider">--}}
{{--                                                            <div class="form-group mt-2">--}}
{{--                                                                <button type="submit" class="btn btn-lg btn-primary">Add Attribute</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- .profile-ud-list -->--}}
{{--                                        </div><!-- .nk-block -->--}}
{{--                                    </div><!-- .card-inner -->--}}
{{--                                </div><!-- .card-content -->--}}
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                        <!-- Modal Form -->

{{--                        <div class="card card-preview">--}}
{{--                            <div class="card-inner">--}}
{{--                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">--}}
{{--                                    <thead>--}}
{{--                                    <tr class="nk-tb-item nk-tb-head">--}}
{{--                                        <th class="nk-tb-col"><span class="sub-text">Product SKU</span></th>--}}
{{--                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Product Colour</span></th>--}}
{{--                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Product Size</span></th>--}}
{{--                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Product Price</span></th>--}}
{{--                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Product Stock</span></th>--}}
{{--                                        <th class="nk-tb-col nk-tb-col-tools text-right">--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($product['attributes'] as $key=>$attribute )--}}
{{--                                            <tr class="nk-tb-item">--}}
{{--                                                <td class="nk-tb-col">--}}
{{--                                                    <div class="user-card">--}}
{{--                                                        <div class="user-info">--}}
{{--                                                            <span class="tb-lead">{{$attribute->attributes_sku}}<span class="dot dot-success d-md-none ml-1"></span></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">--}}
{{--                                                    <span>{{$attribute->attributes_colour}}</span>--}}
{{--                                                </td>--}}
{{--                                                <td class="nk-tb-col tb-col-md">--}}
{{--                                                    <span>{{$attribute->attributes_size}}</span>--}}
{{--                                                </td>--}}
{{--                                                <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">--}}
{{--                                                    <span>{{$attribute->attributes_price}}</span>--}}
{{--                                                </td>--}}
{{--                                                <td class="nk-tb-col tb-col-lg">--}}
{{--                                                    <span>{{$attribute->attributes_stock}}</span>--}}
{{--                                                </td>--}}
{{--                                                    <td class="nk-tb-col nk-tb-col-tools">--}}
{{--                                                        <ul class="nk-tb-actions gx-1">--}}
{{--                                                            <li>--}}
{{--                                                                <div class="drodown">--}}
{{--                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                                        <ul class="link-list-opt no-bdr">--}}
{{--                                                                            <li><a href="{{route('admin.edit.attributes',$attribute->id)}}"><em class="icon ni ni-edit"></em><span>Edit Attributes</span></a></li>--}}
{{--                                                                            <li><a href="{{route('admin.delete.attributes', $attribute->id)}}" onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-eye"></em><span>Delete Product</span></a></li>--}}

{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </td>--}}
{{--                                            </tr><!-- .nk-tb-item  -->--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div><!-- .card-preview -->--}}
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection

<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div style="display: flex"><input type="text" name="product_sku[]"  value="" class="form-control" placeholder="SKU" style="width: 120px;margin-right: 5px; margin-top: 5px;"/><input type="text" name="product_colour[]"  value="" class="form-control" placeholder="Colour" style="width: 120px;margin-right: 5px; margin-top: 5px;"/><input type="text" name="product_size[]"  value="" class="form-control" placeholder="Size" style="width: 120px;margin-right: 5px; margin-top: 5px;"/><input type="text" name="product_price[]"  value="" class="form-control" placeholder="price" style="width: 120px; margin-right: 5px; margin-top: 5px;"/><input type="text" name="product_stock[]"  value="" class="form-control" placeholder="Stock" style="width: 120px;margin-right: 5px; margin-top: 5px;"/><a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" style="margin-top: 5px;">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
