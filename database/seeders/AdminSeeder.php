<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Order;
use App\Models\OrderLine;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        Customer::create([
            'first_name' => 'john',
            'last_name' => 'wick',
            'email' => 'a@gmail.com',
            'mobile' => '9876543210',
            'password' => Hash::make('password'),
        ]);
        CustomerAddress::create([
            'customer_id' => 1,
            'name'=>'john',
            'mobile'=>'9876543210',
            'house_name' => 'wick villa',
            'area' => 'pala',
            'city' => 'Kozhikode',
            'state' => 'Kerala',
            'pincode' => '670525',
            'landmark' => 'cyber park',
        ]);
        Coupon::create([
            'name' => 'Save flat 50',
            'code' => '5KH85DET',
            'date_from' => '2021-03-31 05:47:35',
            'date_to' => '2021-03-31 05:47:35',
            'type' => 0,
            'type_value' => 30,
        ]);
        Category::create([
            'category_name' => 'men',
        ]);
        Category::create([
            'category_name' => 'women',
        ]);
        Material::create([
            'material_name' => 'material 1',
        ]);
        Product::create([
            'product_name' => 'product 1',
            'description' => 'Lorem ipsum dolor!',
            'size' => 'XL',
            'color' => 'white',
            'material_id' => 1,
            'category_id' => 1,
        ]); 
        Productimage::create([
            'product_id' => '1',
            'image' => 'image/img.png',

        ]);
        Order::create([
            'customer_id' => 1,
            'customer_address_id' => 1,
            'amount' => 450,
            'discount' => 10,
            'coupon_id' => 1,
            'placed_at' => '2021-03-31 05:47:35',
        ]);
        OrderLine::create([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'unit_price' => 500,
            'sum' => 500,
        ]);
    }
}
