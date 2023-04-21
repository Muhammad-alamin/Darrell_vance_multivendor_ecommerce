<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['subcategories'] = DB::table('sub_categories')
            ->join('categories','sub_categories.category_id', 'categories.id')
            ->select('categories.category_name','sub_categories.*')
            ->orderBy('sub_categories.id','DESC')
            ->paginate(10);
        return view('admin.subcategory.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['categories'] = Category::all();
        return view('admin.subcategory.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required',
            'subcat_name'   => 'required',
            'image'         =>  'mimes:jpeg,png'
        ]);

        $subCat = new SubCategory();

        $subCat->category_id = $request->category_id;
        $subCat->subcat_name = $request->subcat_name;


        if ($request->hasFile('image')){

            $path = 'images/subcategory';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            if ($subCat->subcate_image != null && file_exists($subCat->subcate_image)){
                unlink($subCat->subcate_image);
            }

            $subCat->subcate_image = $path .'/'. $file_name;

        }
        $subCat->save();

        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['categories'] = Category::all();
        $data['subcategory']= SubCategory::find($id);
        return view('admin.subcategory.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'   => 'required',
            'subcat_name'   => 'required',
            'image'         =>  'mimes:jpeg,png'
        ]);

        $subCat = SubCategory::find($id);
        $subCat->category_id = $request->category_id;
        $subCat->subcat_name = $request->subcat_name;


        if ($request->hasFile('image')){

            $path = 'images/subcategory';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            if ($subCat->subcate_image != null && file_exists($subCat->subcate_image)){
                unlink($subCat->subcate_image);
            }

            $subCat->subcate_image = $path .'/'. $file_name;

        }

        $subCat->save();
        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory=SubCategory::find($id);

        if ($subCategory->subcate_image != null && file_exists($subCategory->subcate_image)){
            unlink($subCategory->subcate_image);
        }
        SubCategory::destroy($id);

        return redirect()->route('sub-category.index');
    }
}
