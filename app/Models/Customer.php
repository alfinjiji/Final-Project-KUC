<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = "customer_id";

    public function wallet()
    {
        return $this->hasOne(Wallet::class,'customer_id','customer_id');
    }

    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class,'customer_id','customer_id');
    }
}
