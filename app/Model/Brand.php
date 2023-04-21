<?php

namespace App\Model;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'id');
    }

}
