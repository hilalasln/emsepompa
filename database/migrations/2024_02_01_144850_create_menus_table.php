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
        if (!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('url');
                $table->boolean('status')->nullable()->default(true);
                $table->integer('submenu_id');
                $table->integer('menu_position_id'); //1 ise header, 2 ise footer
                $table->integer('created_User_Id');
                $table->integer('updated_User_Id');
                $table->integer('order_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
