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
        if (!Schema::hasTable('users')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                // site Bilgileri
                $table->text('logo');
                $table->text('hover');
                $table->text('mobileLogo');
                $table->text('favicon');
                $table->text('copyright');

                // İletişim Bilgileri
                $table->string('companyName');
                $table->string('address');
                $table->integer('phone');
                $table->integer('fax');
                $table->integer('gsm');
                $table->string('email');

                // SEO Ayarları
                $table->string('title');
                $table->text('description');
                $table->text('keywords');
                $table->text('author');
                $table->text('robots');
                $table->text('publisher');
                $table->text('language');
                $table->text('generator');
                $table->text('googlebot');
                $table->text('bingbot');
                $table->text('alexa');


                // İzleme Kodları
                $table->text('headerCode');
                $table->text('footerCode');


                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
