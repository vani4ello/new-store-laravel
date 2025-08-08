<?php

namespace Src\Catalog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Catalog\Database\Factories\ListingFactory;
use Src\Catalog\Enums\ListingType; // <-- 1. Імпортуємо наш новий Enum

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'price',
        'sale_price',
        'sale_ends_at',
        'type',
        'quantity',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sale_ends_at' => 'datetime',
        'type' => ListingType::class, // <-- 2. Додаємо поле 'type' до масиву casts
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): ListingFactory
    {
        return ListingFactory::new();
    }

    /**
     * Get the product that the listing belongs to.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user (seller) that owns the listing.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}