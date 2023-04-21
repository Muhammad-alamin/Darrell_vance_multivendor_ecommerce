@extends('vendor.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    @if(session('success'))
                                        <div class="alert alert-danger">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                    <div class="card-inner">
                                        <form action="{{route('stock.update', \Illuminate\Support\Facades\Crypt::encryptString($product->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_stock" class="form-label">Product Quantity</label>
                                                            <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="{{old('product_quantity', isset($product)?$product->product_quantity:null)}}" placeholder="Enter Product Quantity">
                                                            @error('product_quantity')<i class="text-danger">{{$message}}</i>@enderror
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
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">

</script>

<script type="text/javascript">

    $(document).ready(function() {

        $("#add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>





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
