<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Змінюємо текстові поля на JSON для підтримки перекладів.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('description')->nullable()->change();
            $table->json('seo_title')->nullable()->change();
            $table->json('seo_description')->nullable()->change();
        });
        
        Schema::table('categories', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('description')->nullable()->change();
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('description')->nullable()->change();
        });

        Schema::table('blueprints', function (Blueprint $table) {
            // У моделі Blueprint ми вказали, що 'name' теж перекладається
            $table->json('name')->change();
            $table->json('name_template')->nullable()->change();
            $table->json('description_template')->nullable()->change();
            $table->json('seo_title_template')->nullable()->change();
            $table->json('seo_description_template')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     * Повертаємо поля назад до текстового типу.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('description')->nullable()->change();
            $table->string('seo_title')->nullable()->change();
            $table->text('seo_description')->nullable()->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('description')->nullable()->change();
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('description')->nullable()->change();
        });

        Schema::table('blueprints', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('name_template')->nullable()->change();
            $table->text('description_template')->nullable()->change();
            $table->text('seo_title_template')->nullable()->change();
            $table->text('seo_description_template')->nullable()->change();
        });
    }
};