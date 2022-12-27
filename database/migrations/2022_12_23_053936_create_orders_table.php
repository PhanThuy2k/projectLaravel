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
            $table->id();
            $table->string('address',100);
            $table->string('email',100);
            $table->string('name',100);
            $table->tinyInteger('status')->default(1);
            $table->string('note',100);
            $table->string('phone',100);
            $table->double('total_quantity', 12, 2);
            $table->double('total_price', 12, 2);

            // khóa ngoại tới users 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
