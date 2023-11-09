<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id',20)->default(0);
            $table->string('bank_info_id')->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('withdraw_amount')->nullable();
            $table->string('complete_date')->nullable();
            $table->string('vendor_message')->nullable();
            $table->string('admin_message')->nullable();
            $table->enum('status',['Pending','Processing','Canceled','Complete'])->default('Pending');
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
        Schema::dropIfExists('withdraws');
    }
}
