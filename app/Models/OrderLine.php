<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductSize;
class OrderLine extends Model
{
    use HasFactory;
    protected $primaryKey = "orderline_id";
    protected $fillable = ['order_id','product_id','productsize_id','quantity','unit_price','sum'];

    public function product(){
        return $this->hasOne(Product::class,'product_id', 'product_id');
    }
    public function productsize(){
        return $this->hasOne(ProductSize::class,'productsize_id', 'productsize_id');
    }
}
