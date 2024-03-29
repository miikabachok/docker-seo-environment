<?php

namespace Database\Seeders\MongoDB;

use App\Models\MongoDB\Show;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Show::create([
            'title' => 'Шепіт ночі',
            'description' => 'Ця таємнича вистава розповідає історію про те, як ніч може приховувати найглибші таємниці. Зануртеся у світ, де кожен шепіт ночі несе з собою загадки та сюрпризи.',
            'gallery' => [
                [
                    'src' => 'images/1.webp',
                    'alt' => 'Афіша вистави \'Шепіт ночі\' з виглядом таємничої ночі',
                ],
                [
                    'src' => 'images/2.webp',
                    'alt' => 'Актори вистави \'Шепіт ночі\', які втілюють таємничі персонажі',
                ],
                [
                    'src' => 'images/3.webp',
                    'alt' => 'Сцена вистави \'Шепіт ночі\' з декорацією, яка передає атмосферу таємничої ночі',
                ],
            ],
            'hall' => [
                'title' => 'Зал №1',
                'seats' => 130,
            ],
            'meta' => [
                'h1' => 'Шепіт ночі: Таємнича вистава в Театральному Порталі',
                'title' => 'Купити квитки на виставу \'Шепіт ночі\' - Інформація та ціни | Театральний Портал',
                'description' => 'Дізнайтеся більше про таємничу виставу \'Шепіт ночі\'. Розкривайте найглибші таємниці у світі ночі. Купуйте квитки за доступною ціною.',
                'keywords' => 'вистава, Шепіт ночі, таємнича вистава, ніч, театр, квитки',
            ],
            'order_seats' => [],
            'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(19, 30),
            'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 15),
            'price' => 130,
            'created_at' => (new \DateTime()),
            'updated_at' => (new \DateTime()),
        ]);

        Show::create([
            'title' => 'Танець світла',
            'description' => 'В цій феєричній виставі світло виступає головним героєм. Дивовижні світлові ефекти та танці створюють магічну атмосферу, яка залишить вас зачарованими.',
            'gallery' => [
                [
                    'src' => 'images/4.webp',
                    'alt' => 'Афіша вистави \'Танець світла\' з вражаючим світловим дизайном',
                ],
                [
                    'src' => 'images/5.webp',
                    'alt' => 'Танцівники вистави \'Танець світла\', оточені вражаючими світловими ефектами',
                ],
                [
                    'src' => 'images/6.webp',
                    'alt' => 'Сцена вистави \'Танець світла\' з величезним світловим витоком, який створює магічну атмосферу',
                ],
            ],
            'hall' => [
                'title' => 'Зал №2',
                'seats' => 120,
            ],
            'meta' => [
                'h1' => 'Танець світла: Захоплююча вистава в Театральному Порталі',
                'title' => 'Купити квитки на виставу \'Танець світла\' - Інформація та ціни | Театральний Портал',
                'description' => 'Дізнайтеся більше про захоплюючу виставу \'Танець світла\'. Розкривайте таємниці світла та танцю у неймовірній атмосфері. Купуйте квитки за доступною ціною.',
                'keywords' => 'вистава, Танець світла, світло, танець, театр, квитки',
            ],
            'order_seats' => [],
            'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(19, 45),
            'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 35),
            'price' => 150,
            'created_at' => (new \DateTime()),
            'updated_at' => (new \DateTime()),
        ]);

        Show::create([
            'title' => 'Симфонія сну',
            'description' => 'Відправтеся у подорож у світ снів, де музика, кольори та танці об\'єднуються в гармонійну симфонію. Ця вистава перенесе вас у реальність сновидінь.',
            'gallery' => [
                [
                    'src' => 'images/7.webp',
                    'alt' => 'Афіша вистави \'Симфонія сну\' з магічними образами та кольоровою палітрою',
                ],
                [
                    'src' => 'images/8.webp',
                    'alt' => 'Танцівники вистави \'Симфонія сну\' у витончених образах, що передають атмосферу сновидінь',
                ],
                [
                    'src' => 'images/9.webp',
                    'alt' => 'Сцена вистави \'Симфонія сну\' з інтригуючим світловим дизайном та танцювальними елементами',
                ],
                [
                    'src' => 'images/10.webp',
                    'alt' => 'Артисти вистави \'Симфонія сну\' з музичними інструментами, створюючи гармонійну симфонію',
                ],
            ],
            'hall' => [
                'title' => 'Зал №3',
                'seats' => 115,
            ],
            'meta' => [
                'h1' => 'Симфонія сну: Чарівна вистава в Театральному Порталі',
                'title' => 'Купити квитки на виставу \'Симфонія сну\' - Інформація та ціни | Театральний Портал',
                'description' => 'Дізнайтеся більше про чарівну виставу \'Симфонія сну\'. Поглибіться у світ снів, де музика, кольори та танці створюють неймовірну симфонію. Купуйте квитки за доступною ціною.',
                'keywords' => 'вистава, Симфонія сну, сни, музика, танці, театр, квитки',
            ],
            'order_seats' => [],
            'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(20, 00),
            'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 50),
            'price' => 165,
            'created_at' => (new \DateTime()),
            'updated_at' => (new \DateTime()),
        ]);

        Show::create([
            'title' => 'Легенди прадавнього лісу',
            'description' => 'Дізнайтеся про захоплюючу виставу \'Легенди прадавнього лісу\', яка вводить глядачів у магічний світ легенд та відьом. Споглядайте, як стародавні оповідання оживають на сцені, де вас очікує пригоди, таємниці та зачарована краса лісового царства. Вражайтеся дотепним сюжетом, талановитою грою акторів та чарівною атмосферою цієї вистави. Купуйте квитки зараз та вирушайте у неповторний світ \'Легенд прадавнього лісу\'.',
            'gallery' => [
                [
                    'src' => 'images/11.webp',
                    'alt' => 'Афіша вистави \'Легенди прадавнього лісу\' з таємничими образами та відьмами',
                ],
                [
                    'src' => 'images/12.webp',
                    'alt' => 'Актори вистави \'Легенди прадавнього лісу\' в ролі персонажів легенд та чарівниць',
                ],
                [
                    'src' => 'images/13.webp',
                    'alt' => 'Сцена вистави \'Легенди прадавнього лісу\' з чудовою візуалізацією лісового царства',
                ],
                [
                    'src' => 'images/14.webp',
                    'alt' => 'Емоційна гра акторів та талановитий сюжет вистави \'Легенди прадавнього лісу\'',
                ],
            ],
            'hall' => [
                'title' => 'Зал №1',
                'seats' => 130,
            ],
            'meta' => [
                'h1' => 'Легенди прадавнього лісу: Захоплююча вистава в Театральному Порталі',
                'title' => 'Купити квитки на виставу \'Легенди прадавнього лісу\' - Інформація та ціни | Театральний Портал',
                'description' => 'Дізнайтеся більше про захоплюючу виставу \'Легенди прадавнього лісу\'. Відправтеся у магічний світ легенд та відьом. Купуйте квитки за доступною ціною.',
                'keywords' => 'вистава, Легенди прадавнього лісу, легенди, відьми, театр, квитки',
            ],
            'order_seats' => [],
            'start_at' => (new \DateTime())->add((new \DateInterval('P59D')))->setTime(19, 45),
            'end_at' => (new \DateTime())->add((new \DateInterval('P59D')))->setTime(21, 40),
            'price' => 160,
            'created_at' => (new \DateTime()),
            'updated_at' => (new \DateTime()),
        ]);
    }
}
