@extends('admin.layouts.master')

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
                                        <form action="{{route('admin.rating.update', encrypt($ratings->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_name" class="form-label">Product Name</label>
                                                            <input type="text" class="form-control" disabled placeholder="{{$ratings->products->product_name}}">
                                                            @error('product_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_sku" class="form-label">Product SKU </label>
                                                            <input type="text" class="form-control"disabled name="user_email"  placeholder="{{$ratings->users->email}}">
                                                            @error('user_email')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_description" class="form-label">Product Description</label>
                                                            <textarea class="form-control no-resize" name="review"  placeholder="">{{$ratings->review}}</textarea>
                                                            @error('review')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="product_status" class="form-label">Rating Status</label>
                                                            <div class="form-check">
                                                                <input type="radio" name="rating_status" class="form-check-input" @if(old('rating_status',isset($ratings)?$ratings->rating_status:null)  == 'Active') checked @endif value="Active" id="Active">
                                                                <label  for="active">Active</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" name="rating_status" class="form-check-input" @if(old('rating_status',isset($ratings)?$ratings->rating_status:null)  == 'Inactive') checked @endif value="Inactive" id="Inactive">
                                                                <label for="inactive">Inactive</label>
                                                            </div>
                                                            @error('rating_status')<i class="text-danger">{{ $message }}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="product_status" class="form-label">Product Approval</label>
                                                            <div class="form-check">
                                                                <input type="radio" name="rating_approval" class="form-check-input" @if(old('rating_approval',isset($ratings)?$ratings->rating_approval:null)  == 'Approved') checked @endif value="Approved" id="Approved">
                                                                <label  for="active">Approved</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" name="rating_approval" class="form-check-input" @if(old('rating_approval',isset($ratings)?$ratings->rating_approval:null)  == 'Unapproved') checked @endif value="Unapproved" id="Unapproved">
                                                                <label for="inactive">Unapproved</label>
                                                            </div>
                                                            @error('rating_approval')<i class="text-danger">{{ $message }}</i>@enderror
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
