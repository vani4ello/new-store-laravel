<?php

namespace Src\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\Catalog\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->catchPhrase();
        $slug = Str::slug($name);

        return [
            'name' => [
                'en' => $name,
                'uk' => $this->getUkrainianName($name)
            ],
            'slug' => $slug,
            'description' => [
                'en' => $this->getEnglishDescription($name),
                'uk' => $this->getUkrainianDescription($name)
            ],
            'is_visible' => true,
            'is_featured' => $this->faker->boolean(25),
            'seo_title' => [
                'en' => $this->generateSeoTitle($name, 'en'),
                'uk' => $this->generateSeoTitle($name, 'uk')
            ],
            'seo_description' => [
                'en' => $this->generateSeoDescription($name, 'en'),
                'uk' => $this->generateSeoDescription($name, 'uk')
            ],
        ];
    }

    private function getUkrainianName(string $englishName): string
    {
        $translations = [
            'Advanced' => 'Передовий', 'Smart' => 'Розумний', 'Premium' => 'Преміум',
            'Professional' => 'Професійний', 'Digital' => 'Цифровий', 'Wireless' => 'Бездротовий',
            'Portable' => 'Портативний', 'Compact' => 'Компактний', 'Ultra' => 'Ультра',
            'Pro' => 'Про', 'Elite' => 'Елітний', 'Modern' => 'Сучасний', 'Classic' => 'Класичний',
            'Innovative' => 'Інноваційний', 'Revolutionary' => 'Революційний', 'High-Quality' => 'Високоякісний',
            'Durable' => 'Міцний', 'Efficient' => 'Ефективний', 'Versatile' => 'Універсальний', 'Reliable' => 'Надійний'
        ];
        $ukrainianName = $englishName;
        foreach ($translations as $english => $ukrainian) {
            $ukrainianName = str_replace($english, $ukrainian, $ukrainianName);
        }
        return $ukrainianName;
    }

    private function getEnglishDescription(string $productName): string
    {
        $descriptions = [
            'Advanced' => "Experience cutting-edge technology with our advanced product. This innovative solution combines state-of-the-art features with user-friendly design, making it perfect for both professionals and enthusiasts. Built with premium materials and engineered for performance, it delivers exceptional results in every use case. The advanced functionality ensures you stay ahead of the competition while maintaining ease of use.",
            'Smart' => "Discover the future of convenience with our smart product. This intelligent solution adapts to your needs, learning from your preferences to provide a personalized experience. Equipped with the latest connectivity features, it seamlessly integrates with your existing devices and smart home ecosystem. The intuitive interface makes complex tasks simple, while the powerful processing capabilities handle demanding applications with ease.",
            'Premium' => "Indulge in luxury with our premium product. Crafted with the finest materials and attention to detail, this exceptional item represents the pinnacle of quality and design. Every component has been carefully selected and tested to ensure superior performance and durability. The elegant aesthetics complement any environment, while the sophisticated features provide unmatched functionality.",
            'Professional' => "Meet the demands of professional environments with our professional-grade product. Designed for rigorous daily use, this reliable solution delivers consistent performance under pressure. The robust construction withstands challenging conditions, while the advanced features streamline your workflow. Trusted by industry experts, it's the choice for those who demand excellence.",
            'Digital' => "Embrace the digital revolution with our cutting-edge digital product. This modern solution leverages the latest technology to provide seamless digital experiences. The intuitive digital interface simplifies complex operations, while the powerful digital processing capabilities handle multiple tasks simultaneously. Perfect for the digital age, it keeps you connected and productive.",
            'Wireless' => "Cut the cords and experience true freedom with our wireless product. This innovative solution eliminates the hassle of tangled wires while maintaining exceptional performance. The advanced wireless technology ensures stable connections and fast data transfer speeds. Whether you're at home, in the office, or on the go, enjoy the convenience of wireless connectivity.",
            'Portable' => "Take your productivity anywhere with our portable product. This compact and lightweight solution is designed for on-the-go professionals and travelers. Despite its small size, it packs powerful features and impressive performance. The durable construction ensures it can handle the rigors of travel, while the long battery life keeps you working throughout the day.",
            'Compact' => "Maximize your space with our compact product. This space-saving solution delivers full functionality in a smaller footprint, perfect for modern living and working environments. The intelligent design optimizes every square inch, providing all the features you need without taking up unnecessary space. Ideal for small offices, apartments, or anywhere space is at a premium.",
            'Ultra' => "Experience ultra-performance with our ultra product. This high-performance solution pushes the boundaries of what's possible, delivering exceptional speed, power, and efficiency. The ultra-modern design incorporates the latest technological advancements, while the ultra-reliable construction ensures long-lasting performance. For those who demand the very best.",
            'Pro' => "Unlock professional capabilities with our pro product. This professional-grade solution is designed for serious users who need advanced features and reliable performance. The pro-level functionality provides tools and options that casual users don't need, while the robust construction handles demanding workloads. Trusted by professionals worldwide."
        ];
        foreach ($descriptions as $keyword => $description) {
            if (stripos($productName, $keyword) !== false) {
                return $description;
            }
        }
        return "Discover the perfect blend of innovation and functionality with our exceptional product. This carefully crafted solution combines cutting-edge technology with thoughtful design to deliver an outstanding user experience. Built with quality materials and engineered for performance, it meets the highest standards of reliability and efficiency. Whether you're a professional or casual user, this product will exceed your expectations and enhance your daily activities. The intuitive design ensures easy operation, while the advanced features provide the capabilities you need to succeed in today's fast-paced world.";
    }

    private function getUkrainianDescription(string $productName): string
    {
        $descriptions = [
            'Advanced' => "Відчуйте передові технології з нашим передовим продуктом. Це інноваційне рішення поєднує найновіші функції з зручним дизайном, що робить його ідеальним як для професіоналів, так і для ентузіастів. Створений з преміум матеріалів та спроектований для продуктивності, він забезпечує виняткові результати в кожному випадку використання. Передова функціональність гарантує, що ви залишаєтесь попереду конкурентів, зберігаючи при цьому простоту використання.",
            'Smart' => "Відкрийте майбутнє зручності з нашим розумним продуктом. Це інтелектуальне рішення адаптується до ваших потреб, навчаючись на ваших уподобаннях для забезпечення персоналізованого досвіду. Оснащений найновішими функціями підключення, він безперешкодно інтегрується з вашими існуючими пристроями та екосистемою розумного дому. Інтуїтивний інтерфейс робить складні завдання простими, а потужні обчислювальні можливості легко справляються з вимогливими додатками.",
            'Premium' => "Насолоджуйтесь розкішшю з нашим преміум продуктом. Створений з найкращих матеріалів та увагою до деталей, цей винятковий предмет представляє вершину якості та дизайну. Кожен компонент був ретельно відібраний та протестований для забезпечення вищої продуктивності та довговічності. Елегантна естетика доповнює будь-яке середовище, а складні функції забезпечують неперевершену функціональність.",
            'Professional' => "Відповідайте вимогам професійних середовищ з нашим продуктом професійного класу. Розроблений для інтенсивного щоденного використання, це надійне рішення забезпечує стабільну продуктивність під тиском. Міцна конструкція витримує складні умови, а передові функції оптимізують ваш робочий процес. Довіра індустріальних експертів - це вибір для тих, хто вимагає досконалості.",
            'Digital' => "Прийміть цифрову революцію з нашим передовим цифровим продуктом. Це сучасне рішення використовує найновіші технології для забезпечення безперешкодних цифрових досвідів. Інтуїтивний цифровий інтерфейс спрощує складні операції, а потужні цифрові обчислювальні можливості одночасно виконують кілька завдань. Ідеально підходить для цифрової ери, він підтримує вас на зв'язку та продуктивним.",
            'Wireless' => "Переріжте дроти та відчуйте справжню свободу з нашим бездротовим продуктом. Це інноваційне рішення усуває незручності заплутаних дротів, зберігаючи при цьому виняткову продуктивність. Передова бездротова технологія забезпечує стабільні з'єднання та швидкі швидкості передачі даних. Незалежно від того, чи ви вдома, в офісі чи в дорозі, насолоджуйтесь зручністю бездротового підключення.",
            'Portable' => "Беріть свою продуктивність скрізь з нашим портативним продуктом. Це компактне та легке рішення розроблене для професіоналів, що пересуваються, та мандрівників. Незважаючи на невеликий розмір, він містить потужні функції та вражаючу продуктивність. Міцна конструкція забезпечує, що він може витримати тяготи подорожей, а довгий час роботи від батареї підтримує вас працюючим протягом дня.",
            'Compact' => "Максимізуйте свій простір з нашим компактним продуктом. Це економне рішення забезпечує повну функціональність у меншому просторі, ідеально підходить для сучасних житлових та робочих середовищ. Розумний дизайн оптимізує кожен квадратний дюйм, надаючи всі функції, які вам потрібні, не займаючи зайвого місця. Ідеально підходить для малих офісів, квартир або будь-де, де простір на вагу золота.",
            'Ultra' => "Відчуйте ультра-продуктивність з нашим ультра продуктом. Це високопродуктивне рішення розширює межі можливого, забезпечуючи виняткову швидкість, потужність та ефективність. Ультра-сучасний дизайн включає найновіші технологічні досягнення, а ультра-надійна конструкція забезпечує довговічну продуктивність. Для тих, хто вимагає найкращого.",
            'Pro' => "Розблокуйте професійні можливості з нашим про продуктом. Це рішення професійного класу розроблене для серйозних користувачів, які потребують передових функцій та надійної продуктивності. Функціональність про-рівня надає інструменти та опції, які не потрібні звичайним користувачам, а міцна конструкція справляється з вимогливими робочими навантаженнями. Довіра професіоналів у всьому світі."
        ];
        foreach ($descriptions as $keyword => $description) {
            if (stripos($productName, $keyword) !== false) {
                return $description;
            }
        }
        return "Відкрийте ідеальне поєднання інновацій та функціональності з нашим винятковим продуктом. Це ретельно створене рішення поєднує передові технології з продуманим дизайном для забезпечення видатного користувацького досвіду. Створений з якісних матеріалів та спроектований для продуктивності, він відповідає найвищим стандартам надійності та ефективності. Незалежно від того, чи ви професіонал чи звичайний користувач, цей продукт перевершить ваші очікування та покращить ваші щоденні заняття. Інтуїтивний дизайн забезпечує легку експлуатацію, а передові функції надають можливості, які вам потрібні для успіху в сучасному швидкому світі.";
    }

    private function generateSeoTitle(string $productName, string $locale): string
    {
        if ($locale === 'uk') {
            return "Купити {$this->getUkrainianName($productName)} - Найкращі ціни та якість";
        }
        return "Buy {$productName} - Best Prices & Quality";
    }

    private function generateSeoDescription(string $productName, string $locale): string
    {
        if ($locale === 'uk') {
            return "Замовте {$this->getUkrainianName($productName)} онлайн. Швидка доставка, гарантія якості, найкращі ціни. Відгуки клієнтів та детальні характеристики.";
        }
        return "Order {$productName} online. Fast delivery, quality guarantee, best prices. Customer reviews and detailed specifications.";
    }
}