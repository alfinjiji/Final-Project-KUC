<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';
    protected $fillable =['customer_id', 'product_id', 'quantity'];
    //for cart
    public function product()
    {
        return $this->hasOne(Product::class,'product_id','product_id');
    }
}
