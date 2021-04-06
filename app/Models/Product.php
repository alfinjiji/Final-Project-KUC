<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material;

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
}
