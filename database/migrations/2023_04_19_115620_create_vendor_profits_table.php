<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_profits', function (Blueprint $table) {
            $table->id();
            $table->string('brand_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('order_id')->nullable();
            $table->integer('order_details_id')->nullable();
            $table->string('profit_amount')->nullable();
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
        Schema::dropIfExists('vendor_profits');
    }
}
