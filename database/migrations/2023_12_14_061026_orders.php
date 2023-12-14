<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('orderNumber');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('customerId');
            $table->unsignedBigInteger('transctionId');
            $table->foreign('userId')->references('id')->on('user');
            $table->foreign('customerId')->references('id')->on('customer');
            $table->foreign('transctionId')->references('id')->on('transaction_type');
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
        //
    }
};
