<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    public function products(){
        return $this->belongsTo(Product::class,'id');
    }
}
