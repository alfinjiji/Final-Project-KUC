<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
class Wallet extends Model
{
    use HasFactory;
    protected $primaryKey='wallet_id';
    protected $fillable = ['customer_id','amount','flag','status'];
    protected $table='wallets';
   
}
