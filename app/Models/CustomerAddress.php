<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $primaryKey = "customer_address_id";
    protected $fillable = ['customer_id','name','mobile','house_name','area','city','state','pincode','landmark'];
}
