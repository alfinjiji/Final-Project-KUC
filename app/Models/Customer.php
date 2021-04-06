<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    
}
