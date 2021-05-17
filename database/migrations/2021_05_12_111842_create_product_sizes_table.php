<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->bigIncrements('productsize_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')->references('size_id')->on('sizes');
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
        Schema::dropIfExists('product_sizes');
    }
}