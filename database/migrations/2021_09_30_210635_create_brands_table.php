<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('brand_name');
            $table->string('brand_phone',20)->unique();
            $table->text('brand_address')->nullable();
            $table->text('brand_image')->nullable();
            $table->text('brand_thumbnail_image')->nullable();
            $table->string('top_brand')->nullable();
            $table->enum('brand_status',['Active','Inactive'])->default('Active')->nullable();
            $table->enum('brand_approval',['Approved','Unapproved'])->default('Unapproved')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
