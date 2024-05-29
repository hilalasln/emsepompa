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
        Schema::table('sliders', function(Blueprint $table){
            $table->string('nameEn')->nullable();
            $table->string('nameRu')->nullable();
            $table->string('nameAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionRu')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->string('buttonNameEn')->nullable();
            $table->string('buttonNameRu')->nullable();
            $table->string('buttonNameAr')->nullable();
            $table->string('buttonLinkEn')->nullable();
            $table->string('buttonLinkRu')->nullable();
            $table->string('buttonLinkAr')->nullable();
            $table->string('imageEn')->nullable();
            $table->string('imageRu')->nullable();
            $table->string('imageAr')->nullable();
        });
    }
};
