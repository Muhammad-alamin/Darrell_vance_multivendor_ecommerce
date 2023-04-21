<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function campro()
    {
        return $this->hasMany(CampaignProduct::class);

    }
}
