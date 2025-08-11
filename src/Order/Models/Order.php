<?php

namespace Src\Order\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Order\Enums\OrderStatus;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_address',
        'delivery_method',
        'notes',
    ];

    protected $casts = [
        'status' => OrderStatus::class, // Автоматично перетворюємо рядок в Enum і назад
    ];

    /**
     * Замовлення належить користувачу.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Замовлення має багато товарних позицій.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}