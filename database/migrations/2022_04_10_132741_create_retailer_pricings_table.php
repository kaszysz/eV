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
        Schema::create('retailer_pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('retailer_id');
            $table->string('retailer_index');
            $table->integer('product_id');
            $table->float('price');
            $table->float('sale')->nullable();
            $table->string('bonus')->nullable();
            $table->string('bonus_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers_pricings');
    }
};
