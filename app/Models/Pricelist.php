<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSize;
use App\Models\Product;
class Pricelist extends Model
{
    use HasFactory;
    protected $primaryKey = 'pricelist_id';
    protected $fillable = ['product_id','date_from','date_to','price','productsize_id'];
   // protected $dates = ['created_at', 'updated_at','date_from','date_to'];

    public function productsize()
    {
        return $this->hasOne(ProductSize::class,'productsize_id','productsize_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'product_id','product_id');
    }
}
