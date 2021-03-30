<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
class Wallet extends Model
{
    use HasFactory;
    protected $table='wallets';
    public function customer(){
        return $this->belongsTo('Customer');
    }
}
