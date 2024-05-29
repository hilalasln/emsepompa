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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('code')->nullable();

            $table->integer('category_id')->nullable();
            

            $table->integer('createUserId');
            $table->integer('updateUserId')->nullable();


            $table->text('entrance')->nullable();
            $table->text('exit')->nullable();
            $table->text('cancellation')->nullable();
            $table->text('extra')->nullable();
            $table->text('information')->nullable();

            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
