<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Model\Campaign;
use App\Model\CampaignProduct;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
   public function list(){
       $data ['campaigns'] = Campaign::where('status','=','Active')->get();
       return view('vendor.campaign.index',$data);
   }
   public function allProducts(){
       $data ['products'] = DB::table('products')
           ->join('categories','products.category_id', 'categories.id')
           ->join('users','products.user_id', 'users.id')
           ->join('brands','products.brand_id', 'brands.id')
           ->select('categories.category_name','users.name','brands.brand_name','products.*')
           ->orderBy('products.id','DESC')
           ->get();
       return view('vendor.campaign.allProducts',$data);
   }
   public function addcampaign($id){
       $data['product'] = Product::where('id',$id)->first();
       $data ['campaigns'] = Campaign::where('status','=','Active')->get();
       return view('vendor.campaign.addProduct',$data);
   }

   public function addProductcampaign(Request $request){
       if (auth()->user()->demo_id == 1) {
           session()->flash('error', 'Demo account are not change anything! thanks');
           return redirect()->route('campaign.product.list');
       }
       else
       {
           $campaignProduct = new CampaignProduct();
           $campaignProduct->campaign_id = $request->addCampaign;
           $campaignProduct->product_id = $request->product_id;
           $campaignProduct->user_id = $request->user_id;
           $campaignProduct->save();
           session()->flash('success', 'Product Added Successfully');
           return redirect()->route('campaign.product.list');
       }
   }

   public function campaignProList(){
       $user_id = auth()->user()->id;
       $data ['campaignPro'] = DB::table('campaign_products')
           ->join('campaigns','campaign_products.campaign_id', 'campaigns.id')
           ->join('products','campaign_products.product_id', 'products.id')
           ->select('campaign_products.*','campaigns.*','products.*')
           ->where('campaign_products.user_id',$user_id)
           ->get();
        return view('vendor.campaign.campaignProductList',$data);
   }
}
