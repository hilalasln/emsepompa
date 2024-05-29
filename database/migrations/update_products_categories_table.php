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
        Schema::table('room_categories', function (Blueprint $table) {
            $table->text('imageEn')->nullable();
            $table->text('imageAr')->nullable();
            $table->text('imageRu')->nullable();
            $table->text('meta_keywordsRu')->nullable();
            $table->text('meta_keywordsAr')->nullable();
            $table->text('meta_keywordsEn')->nullable();
        });
    }
};
