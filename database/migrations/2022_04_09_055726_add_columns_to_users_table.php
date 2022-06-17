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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->integer('voivodeship_id')->after('surname');
            $table->integer('city_id')->after('voivodeship_id');
            $table->string('street')->after('city_id');
            $table->integer('phone_number')->after('street');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('voivodeship_id');
            $table->dropColumn('city_id');
            $table->dropColumn('street');
            $table->dropColumn('phone_number');
        });
    }
};
