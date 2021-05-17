<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material;
use App\Models\Productimage;
use App\Models\Rating;
use App\Models\ProductSize;

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
    //multiple product images
    public function productimages(){
        return $this->hasMany(Productimage::class,'product_id','product_id');
    }
    public function price(){ 
        return $this->hasMany(Pricelist::class,'product_id','product_id');
    }
    //for whishlist
    public function pricelist(){ 
        $current_date=date('Y-m-d');
        return $this->hasOne(Pricelist::class,'product_id','product_id')->whereDate('date_to','>=',$current_date)
        ->whereDate('date_from','<=',$current_date);
    }
    //rate
    public function rating(){
        return $this->hasMany(Rating::class,'product_id','product_id');
    }
    //size
    public function productsize(){
        return $this->hasMany(ProductSize::class,'product_id','product_id');
    }
    
}
