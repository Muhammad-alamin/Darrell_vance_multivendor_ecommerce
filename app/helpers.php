<?php
use App\Model\Cart;
use App\Model\Category;
use Illuminate\Support\Facades\Session;

function cart(){
    $session_id = \Illuminate\Support\Facades\Session::get('session_id');
    $cartItem = Cart::where('session_id',$session_id)->sum('pro_quantity');

    return $cartItem;
}

if (!function_exists('mainNavCategories')){
    function mainNavCategories(){
        $categories = Category::limit(11)->get();
        return $categories;
    }
}

if (!function_exists('deleteItem')){
    function deleteItem($id){
        $session_id = Session::get('session_id');
        $cartData = Cart::where(['id' => $id,'session_id'=>$session_id])->delete();
        return $cartData;
    }
}


