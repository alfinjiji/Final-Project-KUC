<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    use HasFactory;
    protected $primaryKey = 'pricelist_id';
    protected $fillable = ['product_id','date_from','date_to','price'];

}
