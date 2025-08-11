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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Зв'язок з користувачем, який зробив замовлення
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Статус замовлення (наприклад, 'new', 'processing', 'completed', 'cancelled')
            $table->string('status')->default('new');
            
            // Загальна сума замовлення (зберігаємо в копійках/центах для точності)
            $table->unsignedInteger('total_price');

            // Інформація про клієнта (дублюємо на випадок, якщо дані в акаунті зміняться)
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            
            // Інформація про доставку
            $table->text('delivery_address')->nullable();
            $table->string('delivery_method')->nullable();
            
            // Коментар до замовлення
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};