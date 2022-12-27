<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('question', 100);
            $table->string('Answer', 100);
            $table->tinyInteger('status')->default(1);

            // khóa ngoại tới products 
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('comments');
    }
}
