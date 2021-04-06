<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerAddress;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\OrderLine;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = "order_id";
    public function customer(){
        return $this->hasOne(Customer::class, 'customer_id','customer_id');
    }
    public function address(){
        return $this->hasOne(CustomerAddress::class, 'customer_address_id','customer_address_id');
    }
    public function coupon(){
        return $this->hasOne(Coupon::class, 'coupon_id','coupon_id');
    }
    public function orderline()
    {
        return $this->hasMany(OrderLine::class,'order_id','order_id');
    }
}
