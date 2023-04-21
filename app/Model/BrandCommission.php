<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BrandCommission extends Model
{
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'vendor_id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class,'brand_id');
    }

}
