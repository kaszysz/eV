<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_number', '12')->nullable();
            $table->integer('category_id');
            $table->integer('producer_id');
            $table->string('name', '50');
            $table->unsignedInteger('size_id')->nullable();
            $table->unsignedInteger('matrix_id')->nullable();
            $table->unsignedInteger('resolution_id')->nullable();
            $table->unsignedInteger('refresh_rate_id')->nullable();
            $table->unsignedInteger('processor_id')->nullable();
            $table->unsignedInteger('ram_id')->nullable();
            $table->unsignedInteger('disc_id')->nullable();
            $table->unsignedInteger('graphic_card_id')->nullable();
            $table->unsignedInteger('os_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
