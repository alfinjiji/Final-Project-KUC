<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->bigIncrements('customer_address_id');
            //$table->foreignId('customer_id')->constrained('customers','customer_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->String('name');
            $table->String('mobile');
            $table->String('house_name');
            $table->String('area');
            $table->String('city');
            $table->String('state');
            $table->String('pincode');
            $table->String('landmark')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
