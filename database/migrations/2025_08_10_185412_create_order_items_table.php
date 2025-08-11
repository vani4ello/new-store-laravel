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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Зв'язок з замовленням, до якого належить цей товар
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();

            // Зв'язок з пропозицією (Listing), яку купили
            $table->foreignId('listing_id')->constrained('listings')->cascadeOnDelete();
            
            // Дублюємо назву товару і бренду на момент покупки
            $table->string('product_name');
            $table->string('brand_name')->nullable();
            
            // Ціна за ОДНУ одиницю товару (в копійках/центах)
            $table->unsignedInteger('price_per_item');

            // Кількість куплених одиниць
            $table->unsignedInteger('quantity');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};