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
        if (!Schema::hasTable('menu_position')) {
            Schema::create('menu_position', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->integer('created_User_Id');
                $table->integer('updated_User_Id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_position');
    }
};
