<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
