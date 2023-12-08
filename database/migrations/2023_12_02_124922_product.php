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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('sellingPrice');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('unitId');
            $table->unsignedBigInteger('categoryId');
            $table->unsignedBigInteger('subCategoryId');
            $table->foreign('unitId')->references('id')->on('unit');
            $table->foreign('categoryId')->references('id')->on('category');
            $table->foreign('subCategoryId')->references('id')->on('subcategory');
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
