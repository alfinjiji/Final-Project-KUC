<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Favorite extends Model
{
    use HasFactory;
    protected $primaryKey = "favorite_id";
    public function product(){
        return $this->hasOne(Product::class, 'product_id','product_id');
    }
}
