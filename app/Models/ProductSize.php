<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\Pricelist;
use App\Models\Product;

class ProductSize extends Model
{
    use HasFactory;
    protected $primaryKey = "productsize_id";
    protected $fillable = ['product_id','size_id'];
    //price list
    public function pricelist(){
        return $this->hasMany(Pricelist::class,'productsize_id','productsize_id');
    }
    // size
    public function size(){
        return $this->hasOne(Size::class,'size_id','size_id');
    }
    // product
    public function product(){
        return $this->hasOne(Product::class,'product_id','product_id');
    }
   
}
