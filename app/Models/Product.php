<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material;
use App\Models\Productimage;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";
    protected $fillable = ['product_name','description','size','color','material_id','category_id','image'];
    //one to one relationship
    //category
    public function category(){
        return $this->hasOne(Category::class,'category_id','category_id');
    }
    //material
    public function material(){
        return $this->hasOne(Material::class,'material_id','material_id');
    }
    //product images
    public function productimage(){
        return $this->hasOne(Productimage::class,'product_id','product_id');
    }
    public function price()
    {
        return $this->hasMany(Pricelist::class,'product_id','product_id');
    }
    //for whishlist
    public function pricelist()
    {
        return $this->hasOne(Pricelist::class,'product_id','product_id');
    }
    

    // mutator for adding new field wishlist_flag for checking product is in wishlist or not.
    public function setWishlistFlagAttribute($value){
        $this->attributes['wishlist_flag'] = $value;
    }
}
