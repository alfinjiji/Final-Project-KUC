<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;
class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = "customer_id";
    public function walletamount()
    {
        return $this->hasOne('Wallet');
    }
}
