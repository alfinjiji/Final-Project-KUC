<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use App\Models\Product;
class Customer extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable = ['first_name', 'last_name', 'mobile', 'email', 'password'];
    protected $hidden = ['password'];
    
}
