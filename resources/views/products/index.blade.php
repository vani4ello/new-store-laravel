<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Products</title>
    <style>
        body { font-family: sans-serif; }
        .products { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .product { border: 1px solid #ccc; padding: 15px; }
    </style>
</head>
<body>
    <h1>Product Catalog</h1>

    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                <p>Brand: {{ $product->brand->name ?? 'N/A' }}</p>
                {{-- Показуємо ціну з першої пропозиції (listing) --}}
                @if($product->listings->isNotEmpty())
                    <p>Price: {{ $product->listings->first()->price / 100 }} UAH</p>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Посилання для пагінації --}}
    <div>
        {{ $products->links() }}
    </div>
</body>
</html>