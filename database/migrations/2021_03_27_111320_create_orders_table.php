<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            //$table->foreignId('customer_id')->constrained('customers','customer_id')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('customer_address_id')->constrained('customer_addresses','customer_address_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('customer_address_id')->nullable();
            $table->foreign('customer_address_id')->references('customer_address_id')->on('customer_addresses');
            $table->integer('amount');
            $table->float('discount')->default('0.0');
            //$table->foreignId('coupon_id')->constrained('coupons','coupon_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('coupon_id')->on('coupons');
            $table->datetime('placed_at');
            $table->datetime('confirmed_at')->nullable();
            $table->datetime('delivered_at')->nullable();
            $table->boolean('status')->default('1')->comment('1 active, 0 inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
