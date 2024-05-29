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
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();// sayfa adı
                $table->text('content')->nullable(); // sayfa açıklaması
                $table->boolean('home_page')->nullable()->default(false); // Anasayfada Göster
                $table->boolean('status')->nullable()->default(true); // Sayfa durumu
                $table->boolean('menu_status')->nullable()->default(true); // Sayfa durumu
                $table->string('url')->nullable(); // SEO Url
                $table->string('meta_title')->nullable(); // Meta Başlık
                $table->string('meta_description')->nullable(); // Meta Açıklama
                $table->string('meta_keywords')->nullable(); // Meta Keywords
                $table->text('image')->nullable(); // Page Image
                $table->integer('parent_id')->nullable(); // Alt Sayfa
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
