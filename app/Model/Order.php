<?php

namespace App\Model;

use App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING = 'Pending';
    const STATUS_PROCESSING = 'Processing';
    const STATUS_SHIPPED = 'Shipped';
    const STATUS_CANCELED = 'Canceled';
    const STATUS_DELIVERED = 'Delivered';

    const PAYMENT_METHOD_CARD ='card';
    const PAYMENT_METHOD_COD = 'cod';

    const PAYMENT_STATUS_PAID = 'paid';
    const PAYMENT_STATUS_UNPAID = 'unpaid';

    public function order_details(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function brandCommission(){
        return $this->hasMany(BrandCommission::class,'brand_id');
    }
    public function billingAdd(){
        return $this->hasMany(BillingAddress::class,'order_id');
    }
    public function shippingAdd(){
        return $this->hasMany(ShippingAddress::class,'order_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
