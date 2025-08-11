<?php

namespace Src\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Catalog\Models\Listing;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * timestamps для цієї моделі не потрібні,
     * оскільки дата створення така ж, як у замовлення.
     */
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'listing_id',
        'product_name',
        'brand_name',
        'price_per_item',
        'quantity',
    ];

    /**
     * Позиція належить замовленню.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Позиція посилається на конкретну пропозицію (Listing).
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}