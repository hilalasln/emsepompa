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
        Schema::table('rooms', function (Blueprint $table) {
            //delete

            //add
            $table->string('code')->nullable();
            $table->boolean('home_page')->nullable()->default(false);
            $table->boolean('status')->nullable()->default(true);
            $table->string('meta_keyworsdRu')->nullable();
            $table->string('meta_keyworsdAr')->nullable();
            $table->string('meta_keyworsdEn')->nullable();
        });
    }

};
