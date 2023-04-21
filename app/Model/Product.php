<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes(){
        return $this->hasMany(Attributes::class,'product_id');
    }

    public function GalleryImage(){
        return $this->hasMany(GalleryImage::class,'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'pro_id');

    }
        public function brand(){
        return $this->belongsTo(Brand::class);

    }

    public function brandCommission(){
        return $this->belongsTo(BrandCommission::class, 'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function camPro()
    {
        return $this->hasMany(CampaignProduct::class);

    }
}
