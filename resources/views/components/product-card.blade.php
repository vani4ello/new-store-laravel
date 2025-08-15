@props(['product'])

<div class="bg-[#0f0f13] rounded-lg overflow-hidden relative transform transition duration-200 hover:scale-105 hover:-translate-y-1 hover:shadow-neon-md">
    <a href="{{ route('products.show', $product) }}" class="block">
        
        <div class="h-36 bg-gradient-to-b from-[#071014] to-[#0b0b0f] overflow-hidden">
            {{-- Перевіряємо правильне поле thumbnail_url --}}
            @if($product->thumbnail_url)
                <img src="{{ $product->thumbnail_url }}"
                     alt="{{ $product->name }}"
                     class="w-full h-full object-cover">
            @else
                {{-- Якщо картинки немає, показуємо заглушку --}}
                <div class="flex items-center justify-center h-full">
                    <svg class="w-16 h-16 text-cyan" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1.586-1.586a2 2 0 010-2-2V6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H3z"/>
                    </svg>
                </div>
            @endif
        </div>

        <div class="p-3">
            <h3 class="text-sm font-semibold text-white truncate" title="{{ $product->name }}">
                {{ $product->name ?? 'Назва відсутня' }}
            </h3>
            
            <div class="flex items-center justify-between mt-2">
                <div class="text-xs text-gray-400 truncate">
                    {{ $product->brand?->name ?? 'Без бренда' }}
                </div>
                
                @if($product->listings && $product->listings->isNotEmpty())
                    @php
                        $minPrice = $product->listings->min('price');
                    @endphp
                    
                    @if(!is_null($minPrice) && is_numeric($minPrice))
                        <div class="text-neon font-bold">
                           від {{ number_format($minPrice / 100, 2, ',', ' ') }} грн
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </a>
</div>