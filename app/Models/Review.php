<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
class Review extends Model
{
    use HasFactory;
    protected $primaryKey = "review_id";
    protected $fillable = ['product_id','customer_id','review_summary','review'];

    public function customer(){
        return $this->hasOne(Customer::class, 'customer_id','customer_id');
    }
}
