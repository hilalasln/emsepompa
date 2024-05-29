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
        Schema::table('pages', function (Blueprint $table) {
            $table->string('titleEn')->nullable(); // sayfa adı
            $table->string('titleRu')->nullable(); // sayfa adı
            $table->string('titleAr')->nullable(); // sayfa adı
            $table->text('contentEn')->nullable(); // sayfa açıklaması
            $table->text('contentRu')->nullable(); // sayfa açıklaması
            $table->text('contentAr')->nullable(); // sayfa açıklaması
            $table->string('urlEn')->nullable();  // SEO Url
            $table->string('urlRu')->nullable();  // SEO Url
            $table->string('urlAr')->nullable();  // SEO Url
            $table->string('meta_titleEn')->nullable();  // Meta Başlık
            $table->string('meta_titleRu')->nullable();  // Meta Başlık
            $table->string('meta_titleAr')->nullable();  // Meta Başlık
            $table->string('meta_descriptionEn')->nullable();  // Meta Açıklama
            $table->string('meta_descriptionRu')->nullable();  // Meta Açıklama
            $table->string('meta_descriptionAr')->nullable();  // Meta Açıklama
            $table->string('meta_keywordsEn')->nullable();  // Meta Keywords
            $table->string('meta_keywordsRu')->nullable(); // Meta Keywords
            $table->string('meta_keywordsAr')->nullable();  // Meta Keywords
            $table->text('imageEn')->nullable(); // Page Image
            $table->text('imageRu')->nullable(); // Page Image
            $table->text('imageAr')->nullable(); // Page Image
        });
    }

};
