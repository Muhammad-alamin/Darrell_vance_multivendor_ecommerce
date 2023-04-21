<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'pro_id');
    }

    public function brandCommission()
    {
        return $this->hasMany(BrandCommission::class,'brand_id');
    }
}
