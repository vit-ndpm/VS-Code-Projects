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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('0-Not Trending, 1-Trending');
            $table->tinyInteger('status')->default('0')->comment('0-Not visible, 1-Hidden');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
