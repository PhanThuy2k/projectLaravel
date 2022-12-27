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
            $table->string('name',100);
            $table->float('price');
            $table->float('sale_price');
            $table->string('image',100);
            $table->tinyInteger('status')->default(1);
            $table->string('origin',100);
            // khoá ngoại tới bảng categories
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            // khoá ngoại tới bảng promotions
            $table->unsignedBigInteger('promotion_id');
            $table->foreign('promotion_id')->references('id')->on('promotions');

            // khoá ngoại tới bảng authors
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
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
