<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class OrderLine extends Model
{
    use HasFactory;
    protected $primaryKey = "orderline_id";
    protected $fillable = ['order_id','product_id','quantity','unit_price','sum'];

    public function product(){
        return $this->hasOne(Product::class,'product_id', 'product_id');
    }
}
