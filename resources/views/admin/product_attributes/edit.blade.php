@extends('admin.layouts.master')

@section('content')

    <<!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('admin.update.attribute', $attribute->id)}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="brand_name" class="form-label">SKU</label>
                                                            <input type="text" class="form-control" name="attributes_sku" id="attributes_sku" value="{{old('attributes_sku', isset($attribute)?$attribute->attributes_sku:null)}}" placeholder="Enter SKU">
                                                            @error('attributes_sku')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="phone" class="form-label">Colour</label>
                                                            <input type="text" class="form-control" name="attributes_colour" id="attributes_colour" value="{{old('attributes_colour', isset($attribute)?$attribute->attributes_colour:null)}}" placeholder="Enter Colour">
                                                            @error('attributes_colour')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="address" class="form-label">Size</label>
                                                            <input type="text" class="form-control" name="attributes_size" id="attributes_size" value="{{old('attributes_size', isset($attribute)?$attribute->attributes_size:null)}}" placeholder="Enter Size">
                                                            @error('attributes_size')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="address" class="form-label">Price</label>
                                                            <input type="text" class="form-control" name="attributes_price" id="attributes_price" value="{{old('attributes_price', isset($attribute)?$attribute->attributes_price:null)}}" placeholder="Enter Size">
                                                            @error('attributes_price')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="address" class="form-label">Stock</label>
                                                            <input type="text" class="form-control" name="attributes_stock" id="attributes_stock" value="{{old('attributes_stock', isset($attribute)?$attribute->attributes_stock:null)}}" placeholder="Enter Size">
                                                            @error('attributes_stock')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection







<!--<script type="text/javascript">
    $(function (){
        var category_id = $('[ name="category_id"]')

        category_id.change(function (){
            var id = $(this).val();

            if (id)
            {
                $.ajax({
                    url: "{{ url('/vendor/sub_category/')}}/"+id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        $("#subcategory").empty();
                        $.each(data,function (key,value){
                            $("#subcategory").append('<option value="'+value.id+'">'+value.subcat_name+'</option>').val(html.data.subcategory);
                        });
                    }
                })
            }

            else {
                alert('danger')
            }
        })
    })
</script>-->
