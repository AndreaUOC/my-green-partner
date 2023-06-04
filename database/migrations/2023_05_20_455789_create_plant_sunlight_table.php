<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plants_sunlights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plant_id')->unsigned();
            $table->integer('sunlight_id')->unsigned();
            $table->timestamps();

            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade'); 
            $table->foreign('sunlight_id')->references('id')->on('sunlights')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants_sunlights', function (Blueprint $table){
            $table->dropForeign('plants_sunlights_plant_id_foreign');
            $table->dropForeign('plants_sunlights_sunlight_id_foreign');
        });
        
        Schema::dropIfExists('plants_sunlights');
    }
};
