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
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_id');
            $table->integer('retailer_id');
            $table->string('street', '100');
            $table->integer('fsr_id')->nullable();
            $table->integer('promoter_id')->nullable();
            $table->integer('priority')->nullable();
            $table->float('geo_latitude', '8', '6');
            $table->float('geo_longitude', '9', '6');
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
        Schema::dropIfExists('shops');
    }
};
