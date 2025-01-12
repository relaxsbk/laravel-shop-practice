<?php

namespace Database\Seeders;

use App\Models\Characteristic;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Найти iPhone 13 и iPhone 15 по названию
        $iphone13 = Product::where('title', 'iPhone 13')->first();
        $iphone16 = Product::where('title', 'iPhone 16')->first();

        // Проверить, что продукты существуют
        if ($iphone13) {
            Characteristic::firstOrCreate(
                ['product_id' => $iphone13->id],
                [
                    'characteristics' => [
                        'Операционная система' => 'iOS',
                        'Количество SIM-карт' => '1',
                        'Тип SIM-карты' => 'nano SIM',
                        'Стандарты связи' => '5G NR, FDD‑LTE, TD‑LTE, GSM/EDGE, UMTS/HSPA+/DC‑HSDPA ',
                        'Модуль сотовой связи' => '2G, 3G, 4G(LTE), 5G ',
                        'Поддержка 5G' => 'да',
                        'Поддержка NFC' => 'есть',
                        'Экран' => '6.1',
                        'Разрешение экрана' => '2532x1170 ',
                        'Яркость' => '800 кд/м2',
                        'Контрастность' => '2000000:1',
                        'Тип дисплея' => 'Super Retina XDR ',
                        'Плотность пикселей' => '460 PPI',
                        'Тип стекла' => 'Ceramic Shield ',
                        'Функция Multi-Touch' => 'да',
                        'Олеофобное покрытие' => 'да',
                        'Производитель процессора' => 'Apple',
                        'Модель процессора' => 'A15 Bionic ',
                        'Количество ядер процессора' => '6',
                        'Встроенная память' => '128 Гб',
                        'Количество основных камер' => '2',
                        'Разрешение основной камеры' => '12/12 Мп',
                        'Широкоугольный объектив' => 'да',
                        'Стабилизация изображения' => 'оптический',
                        'Диафрагма широкоугольного объектива' => 'f/1.6 ',
                        'Кратность оптического увеличения' => '2',
                        'Кратность цифрового увеличения' => '5',
                        'Автофокус' => 'да',
                        'Тип автофокуса' => 'следящий',
                        'Запись GPS координат снимка' => 'да',
                        'Защита объектива сапфировым стеклом' => 'да',
                        'Режимы съемки' => 'портрет с улучшенным эффектом боке и функцией «Глубина», портретное освещение (шесть вариантов: Естественный свет, Студийный свет, Контурный свет, Сценический свет, Сценический свет — ч/б, Светлая тональность — ч/б), панорамная съёмка (до 63 Мп), ночной режим, режим Smart HDR 4, фотографические стили, серийная съёмка ',
                        'Количество фронтальных камер' => '1',
                        'Разрешение фронтальной камеры' => '12 Мп ',
                        'Стабилизатор изображения' => 'автоматический',
                        'Диафрагма' => 'f/2.2',
                        'Вспышка' => 'True Tone с функцией Slow Sync ',
                        'Режимы съемки фронтальной камеры' => 'портрет с улучшенным эффектом боке и функцией «Глубина», портретное освещение (шесть вариантов: Естественный свет, Студийный свет, Контурный свет, Сценический свет, Сценический свет — ч/б, Светлая тональность — ч/б), Animoji и Memoji, ночной режим, режим Smart HDR 4, фотографические стили, режим «Киноэффект» для съёмки видео с малой глубиной резкости, съёмка HDR‑видео в стандарте Dolby Vision до 4K с частотой до 60 к/с, съёмка видео 4K, режим «Таймлапс» со стабилизацией изображения, режим «Таймлапс» в ночном режиме, серийная съёмка, функция QuickTake ',
                        'Качество видеозаписи' => '1080р, 720p, 4K',
                        'Съемка замедленного видео' => 'да',
                        'Частота кадров в секунду' => '24/25/30/60/120/240',
                        'Ночной режим видеосъемки' => 'да',
                        'Количество динамиков' => '2',
                        'Тип разъема' => 'Lightning',
                        'Стандарты Wi-Fi' => 'IEEE 802.11 ax ',
                        'Технология Wi-Fi' => 'MIMO',
                        'Версия Bluetooth' => '5.0',
                        'Спутниковая навигация' => 'ГЛОНАСС, GPS, Galileo, BeiDou, QZSS',
                        'Технология iBeacon' => 'да',
                        'Тип аккумулятора' => 'Li-Ion',
                        'Время работы в режиме воспроизведения видео' => '19 ч',
                        'Время работы в режиме воспроизведения аудио' => '75 ч',
                        'Беспроводная зарядка' => 'да',
                        'Зарядка от USB' => 'да',
                        'Быстрая зарядка' => 'да',
                        'Материал корпуса' => 'алюминий',
                        'Цвет' => 'чёрный',
                        'Защита от влаги и пыли' => 'да',
                        'Класс пылевлагозащищенности' => 'IP68',
                        'Высота' => '14.67 см',
                        'Ширина' => '7.15 см',
                        'Толщина' => '0.76 см',
                        'Вес' => '173 г ',
                        'Год выпуска' => '2021'
                    ],
                ]
            );
        }

        if ($iphone16) {
            Characteristic::firstOrCreate(
                ['product_id' => $iphone16->id],
                [
                    'characteristics' => [
                        'Операционная система' => 'iOS',
                        'Количество SIM-карт' => '1',
                        'Тип SIM-карты' => 'nano SIM',
                        'Стандарты связи' => '5G NR, FDD‑LTE, TD‑LTE, GSM/EDGE, UMTS/HSPA+/DC‑HSDPA ',
                        'Модуль сотовой связи' => '2G, 3G, 4G(LTE), 5G ',
                        'Поддержка 5G' => 'да',
                        'Поддержка NFC' => 'есть',
                        'Экран' => '6.3',
                        'Разрешение экрана' => '2622x1206',
                        'Яркость' => '800 кд/м2',
                        'Контрастность' => '2000000:1',
                        'Тип дисплея' => 'Super Retina XDR ',
                        'Плотность пикселей' => '460 PPI',
                        'Тип стекла' => 'керамическое',
                        'Функция Multi-Touch' => 'да',
                        'Олеофобное покрытие' => 'да',
                        'Производитель процессора' => 'Apple',
                        'Модель процессора' => 'A15 Bionic ',
                        'Количество ядер процессора' => '6',
                        'Встроенная память' => '128 Гб',
                        'Количество основных камер' => '2',
                        'Разрешение основной камеры' => '12/12 Мп',
                        'Широкоугольный объектив' => 'да',
                        'Стабилизация изображения' => 'оптический',
                        'Диафрагма широкоугольного объектива' => 'f/1.6 ',
                        'Кратность оптического увеличения' => '2',
                        'Кратность цифрового увеличения' => '5',
                        'Автофокус' => 'да',
                        'Тип автофокуса' => 'следящий',
                        'Запись GPS координат снимка' => 'да',
                        'Защита объектива сапфировым стеклом' => 'да',
                        'Режимы съемки' => 'портрет с улучшенным эффектом боке и функцией «Глубина», портретное освещение (шесть вариантов: Естественный свет, Студийный свет, Контурный свет, Сценический свет, Сценический свет — ч/б, Светлая тональность — ч/б), панорамная съёмка (до 63 Мп), ночной режим, режим Smart HDR 4, фотографические стили, серийная съёмка ',
                        'Количество фронтальных камер' => '1',
                        'Разрешение фронтальной камеры' => '12 Мп ',
                        'Стабилизатор изображения' => 'автоматический',
                        'Диафрагма' => 'f/2.2',
                        'Вспышка' => 'True Tone с функцией Slow Sync ',
                        'Режимы съемки фронтальной камеры' => 'портрет с улучшенным эффектом боке и функцией «Глубина», портретное освещение (шесть вариантов: Естественный свет, Студийный свет, Контурный свет, Сценический свет, Сценический свет — ч/б, Светлая тональность — ч/б), Animoji и Memoji, ночной режим, режим Smart HDR 4, фотографические стили, режим «Киноэффект» для съёмки видео с малой глубиной резкости, съёмка HDR‑видео в стандарте Dolby Vision до 4K с частотой до 60 к/с, съёмка видео 4K, режим «Таймлапс» со стабилизацией изображения, режим «Таймлапс» в ночном режиме, серийная съёмка, функция QuickTake ',
                        'Качество видеозаписи' => '1080р, 720p, 4K',
                        'Съемка замедленного видео' => 'да',
                        'Частота кадров в секунду' => '24/25/30/60/120/240',
                        'Ночной режим видеосъемки' => 'да',
                        'Количество динамиков' => '2',
                        'Тип разъема' => 'Lightning',
                        'Стандарты Wi-Fi' => 'IEEE 802.11 ax ',
                        'Технология Wi-Fi' => 'MIMO',
                        'Версия Bluetooth' => '5.0',
                        'Спутниковая навигация' => 'ГЛОНАСС, GPS, Galileo, BeiDou, QZSS',
                        'Технология iBeacon' => 'да',
                        'Тип аккумулятора' => 'Li-Ion',
                        'Время работы в режиме воспроизведения видео' => '19 ч',
                        'Время работы в режиме воспроизведения аудио' => '75 ч',
                        'Беспроводная зарядка' => 'да',
                        'Зарядка от USB' => 'да',
                        'Быстрая зарядка' => 'да',
                        'Материал корпуса' => 'титан, алюминий, стекло',
                        'Цвет' => 'розовый',
                        'Защита от влаги и пыли' => 'да',
                        'Класс пылевлагозащищенности' => 'IP68',
                        'Высота' => '14.9 см',
                        'Ширина' => '7.1 см',
                        'Толщина' => '0.8 см',
                        'Вес' => '199 г ',
                        'Год выпуска' => '2024'
                    ],
                ]
            );
        }
    }
}
