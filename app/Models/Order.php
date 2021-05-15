<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerAddress;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\OrderLine;
use App\Models\Payment;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = "order_id";
    protected $fillable = ['customer_id','customer_address_id','amount','discount','coupon_id','payment_mode','payment_status','placed_at'];

    public function customer(){
        return $this->hasOne(Customer::class, 'customer_id','customer_id');
    }
    public function address(){
        return $this->hasOne(CustomerAddress::class, 'customer_address_id','customer_address_id');
    }
    public function coupon(){
        return $this->hasOne(Coupon::class, 'coupon_id','coupon_id');
    }
    public function orderline(){ 
        return $this->hasMany(OrderLine::class,'order_id','order_id');
    }
    public function payment(){
        return $this->hasOne(Payment::class,'order_id','order_id');
    }
}
