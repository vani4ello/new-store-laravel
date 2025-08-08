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
    Schema::table('products', function (Blueprint $table) {
        // Додаємо зовнішній ключ, який посилається на таблицю brands
        $table->foreign('brand_id')
              ->references('id')
              ->on('brands')
              ->nullOnDelete(); // Якщо бренд видаляється, у товару brand_id стає NULL
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        // Видаляємо зовнішній ключ
        $table->dropForeign(['brand_id']);
    });
}
};
