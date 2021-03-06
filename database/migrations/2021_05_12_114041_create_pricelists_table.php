<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->bigIncrements('pricelist_id');
            // $table->foreignId('product_id')->constrained('products','product_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->date('date_from');
            $table->date('date_to');
            $table->float('price');
            $table->unsignedBigInteger('productsize_id')->nullable();
            $table->foreign('productsize_id')->references('productsize_id')->on('product_sizes');
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
        Schema::dropIfExists('pricelists');
    }
}
