<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CampaignProduct extends Model
{
    public function camPro(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class,'campaign_id');
    }
}
