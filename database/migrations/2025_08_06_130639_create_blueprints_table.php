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
        Schema::create('blueprints', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Назва шаблону
            $table->string('name_template')->nullable();
            $table->text('description_template')->nullable();
            $table->string('seo_title_template')->nullable();
            $table->text('seo_description_template')->nullable();
            // ... будь-які інші шаблонні поля
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blueprints');
    }
};
