<?php

namespace Src\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Src\Catalog\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = [
        'name',
        'description',
        'seo_title',
        'seo_description'
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'brand_id',
        'is_visible',
        'is_featured',
        'banner_type',
        'sold_count',
        'regular_price',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'banner_type' => 'string',
        'sold_count' => 'integer',
        'regular_price' => 'integer',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    /**
     * Get the official price formatted as currency
     */
    public function getOfficialPriceAttribute(): string
    {
        if ($this->regular_price) {
            return number_format($this->regular_price / 100, 2) . ' грн';
        }
        return '';
    }

    /**
     * Get the store price from the first active listing
     */
    public function getStorePriceAttribute(): string
    {
        $listing = $this->listings()->where('is_active', true)->first();
        if ($listing) {
            $price = $listing->sale_price ?? $listing->price;
            return number_format($price / 100, 2) . ' грн';
        }
        return '';
    }

    /**
     * Get the store price value in cents
     */
    public function getStorePriceValueAttribute(): ?int
    {
        $listing = $this->listings()->where('is_active', true)->first();
        if ($listing) {
            return $listing->sale_price ?? $listing->price;
        }
        return null;
    }

    /**
     * Get the discount percentage
     */
    public function getDiscountPercentageAttribute(): ?int
    {
        if ($this->regular_price && $this->store_price_value) {
            $discount = (($this->regular_price - $this->store_price_value) / $this->regular_price) * 100;
            return round($discount);
        }
        return null;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}