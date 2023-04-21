<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id');
            $table->foreign('pro_id')->references('id')->on('products');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('pro_name',255);
            $table->string('pro_code')->nullable();
            $table->string('pro_colour')->nullable();
            $table->string('pro_size')->nullable();
            $table->float('pro_price',9,2)->nullable();
            $table->integer('pro_quantity')->default(0);
            $table->string('user_email')->nullable();
            $table->string('session_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
