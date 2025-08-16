<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Catalog\Models\Product;
use Src\Catalog\Models\Listing;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        // Отримуємо банерні товари
        $premiumProduct = Product::where('banner_type', 'premium')
            ->where('is_visible', true)
            ->with(['listings' => function ($query) {
                $query->where('is_active', true);
            }])
            ->first();

        $goldProduct = Product::where('banner_type', 'gold')
            ->where('is_visible', true)
            ->with(['listings' => function ($query) {
                $query->where('is_active', true);
            }])
            ->first();

        $silverProduct = Product::where('banner_type', 'silver')
            ->where('is_visible', true)
            ->with(['listings' => function ($query) {
                $query->where('is_active', true);
            }])
            ->first();

        // Отримуємо топ продажів (4 товари)
        $topSellingProducts = Product::where('is_visible', true)
            ->where('sold_count', '>', 0)
            ->with(['listings' => function ($query) {
                $query->where('is_active', true);
            }])
            ->orderBy('sold_count', 'desc')
            ->limit(4)
            ->get();

        // Отримуємо нові надходження (12 товарів)
        $newArrivals = Product::where('is_visible', true)
            ->with(['listings' => function ($query) {
                $query->where('is_active', true);
            }])
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        return view('home.index', compact(
            'premiumProduct',
            'goldProduct',
            'silverProduct',
            'topSellingProducts',
            'newArrivals'
        ));
    }
}
