@extends('admin.layouts.master')

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
                                    <h4 class="nk-block-title">Vendor List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Category Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Subcategory Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Edit</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Delete</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subcategories as $key=>$subcategory)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$subcategory->category_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$subcategory->subcat_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <img src="{{asset($subcategory->subcate_image)}}" style="height: 40px; width: 40px;"  >
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <div>
                                                    <a href="{{route('sub-category.edit' , $subcategory->id)}}" class=" btn btn-gray btn btn-xs"><em class=" note-icon"></em>Edit</a>
                                                </div>
                                            </td>

                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <form action="{{route('sub-category.destroy', $subcategory->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                        <button class=" btn btn-danger btn btn-xs" onclick="return confirm('Are You Confirm to Delete?')">Delete</button>
                                                </form>
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
