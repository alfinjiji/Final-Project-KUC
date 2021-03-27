<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->String('product_name');
            $table->text('description');
            $table->String('size');
            $table->String('color');
            //$table->foreignId('material_id')->constrained('materials','material_id')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('category_id')->constrained('categories','category_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('material_id')->references('material_id')->on('materials');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->String('image');
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
        Schema::dropIfExists('products');
    }
}
