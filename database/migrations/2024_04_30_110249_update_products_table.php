<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Delete
            $table->dropColumn('entrance');
            $table->dropColumn('exit');
            $table->dropColumn('cancellation');
            $table->dropColumn('extra');
            $table->dropColumn('pets');
            $table->dropColumn('information');

            // Add

            $table->string('code')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleRu')->nullable();
            $table->string('titleAr')->nullable();
            $table->string('contentEn')->nullable();
            $table->string('contentRu')->nullable();
            $table->string('contentAr')->nullable();
            $table->string('shortContent')->nullable();
            $table->string('shortContentEn')->nullable();
            $table->string('shortContentAr')->nullable();
            $table->string('shortContentRu')->nullable();
            $table->string('urlEn')->nullable();
            $table->string('urlAr')->nullable();
            $table->string('urlRu')->nullable();
            $table->string('meta_titleRU')->nullable();
            $table->string('meta_titleEn')->nullable();
            $table->string('meta_titleAR')->nullable();
            $table->string('meta_descriptionRu')->nullable();
            $table->string('meta_descriptionAr')->nullable();
            $table->string('meta_descriptionEn')->nullable();

        });
    }

}
