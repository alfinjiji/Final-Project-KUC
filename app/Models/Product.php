<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material;
use App\Model\Productimage;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";
    protected $fillable = ['product_name','description','size','color','material_id','category_id','image'];
    //one to one relationship
    public function category(){
        return $this->hasOne(Category::class,'category_id','category_id');
    }
    public function material(){
        return $this->hasOne(Material::class,'material_id','material_id');
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
    //for images
    public function productimages()
    {
        return $this->hasMany(Productimage::class,'product_id','product_id');
    }

    // mutator for adding new field wishlist_flag for checking product is in wishlist or not.
    public function setWishlistFlagAttribute($value){
        $this->attributes['wishlist_flag'] = $value;
    }
}
