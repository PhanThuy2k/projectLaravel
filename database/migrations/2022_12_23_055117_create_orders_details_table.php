<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('quantiti')->unsigned();
            $table->double('unit_price')->unsigned();

            // khóa ngoại tới oders
            $table->BigInteger('oder_id')->unsigned();
            $table->foreign('oder_id')->references('id')->on('orders');

            // khóa ngoại tới products
            $table->unsignedBigInteger('pro_detail_id');
            $table->foreign('pro_detail_id')->references('id')->on('product_details');
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
        Schema::dropIfExists('orders_details');
    }
}
