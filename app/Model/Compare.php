<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
