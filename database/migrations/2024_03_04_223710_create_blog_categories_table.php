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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();

            $table->string('title');
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->integer('orderNo')->nullable();

            $table->boolean('home_page')->nullable()->default(false);
            $table->boolean('status')->nullable()->default(true);

            $table->string('url');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');

            $table->integer('createUserId');
            $table->integer('updateUserId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
