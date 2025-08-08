<?php

namespace Src\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Src\Catalog\Database\Factories\ProductFactory; // <--- ВИПРАВЛЕНО

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
        'seo_title',
        'seo_description',
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): ProductFactory // <--- ВИПРАВЛЕНО
    {
        return ProductFactory::new(); // <--- ВИПРАВЛЕНО
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