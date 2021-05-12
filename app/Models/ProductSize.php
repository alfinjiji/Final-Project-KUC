<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class ProductSize extends Model
{
    use HasFactory;
    protected $primaryKey = "productsize_id";
    protected $fillable = ['product_id','size_id'];
    public function size()
    {
        return $this->hasOne(Size::class,'size_id','size_id');
    }
}
