<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
//    public function order()
//    {
//        return $this->belongsTo(Order::class, 'id');
//    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function brandCommission(){
        return $this->belongsTo(BrandCommission::class,'brand_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
