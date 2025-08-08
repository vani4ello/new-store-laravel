<?php

namespace Src\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\Factory; // Додаємо цей імпорт для type hint
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Src\Catalog\Database\Factories\BlueprintFactory; // <--- ВИПРАВЛЕНО

class Blueprint extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
        'name_template',
        'description_template',
        'seo_title_template',
        'seo_description_template',
    ];

    protected $fillable = [
        'name',
        'name_template',
        'description_template',
        'seo_title_template',
        'seo_description_template',
    ];
    
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): BlueprintFactory // <--- ВИПРАВЛЕНО
    {
        return BlueprintFactory::new(); // <--- ВИПРАВЛЕНО
    }
}