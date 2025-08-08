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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
    
            // Зв'язок з "Вікі-товаром" (Product)
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            // Зв'язок з продавцем (User). В майбутньому це буде Vendor/Store.
            // Ми додамо foreign key пізніше, коли будемо робити мульти-вендорність.
            $table->unsignedBigInteger('user_id');
    
            // --- Ціноутворення ---
            $table->unsignedInteger('price'); // Ціна в копійках/центах для точності
            $table->unsignedInteger('sale_price')->nullable(); // Ціна зі знижкою
            $table->timestamp('sale_ends_at')->nullable(); // Коли закінчується знижка
    
            // --- Логіка запасів (відповідь на ваш запит) ---
            $table->enum('type', ['limited', 'unlimited'])->default('limited');
            $table->integer('quantity')->default(0); // Кількість для 'limited' товарів
            
            $table->boolean('is_active')->default(true); // Чи активна пропозиція
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
