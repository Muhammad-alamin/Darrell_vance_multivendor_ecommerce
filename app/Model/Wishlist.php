<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'w_product_id');
    }
}
