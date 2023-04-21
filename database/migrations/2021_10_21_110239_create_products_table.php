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
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('product_name',255);
            $table->text('product_description')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_colour')->nullable();
            $table->string('product_buying_date')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_thumbnail_image')->nullable();
            $table->string('video')->nullable();
            $table->float('product_regular_price',9,2)->nullable();
            $table->float('product_discount_price',9,2)->nullable();
            $table->integer('product_quantity')->default(0);
            $table->integer('product_stock')->nullable();
            $table->integer('product_discount_percent')->nullable();
            $table->integer('product_discount_amount')->nullable();
            $table->string('product_size')->nullable();
            $table->enum('product_status',['Active','Inactive'])->default('Active');
            $table->enum('product_approval',['Approved','Unapproved'])->default('Unapproved');
            $table->string('featured_products')->nullable();
            $table->string('best_selling_products')->nullable();
            $table->string('popular_products')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
