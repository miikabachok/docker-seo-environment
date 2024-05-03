<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table((new Show())->getTable())->insert([
            [
                'id' => 1,
                'hall_id' => 1,
                'title' => 'Шепіт ночі',
                'description' => 'Ця таємнича вистава розповідає історію про те, як ніч може приховувати найглибші таємниці. Зануртеся у світ, де кожен шепіт ночі несе з собою загадки та сюрпризи.',
                'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(19, 30),
                'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 15),
                'price' => 130,
                'created_at' => (new \DateTime()),
                'updated_at' => (new \DateTime()),
            ],
            [
                'id' => 2,
                'hall_id' => 2,
                'title' => 'Танець світла',
                'description' => 'В цій феєричній виставі світло виступає головним героєм. Дивовижні світлові ефекти та танці створюють магічну атмосферу, яка залишить вас зачарованими.',
                'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(19, 45),
                'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 35),
                'price' => 150,
                'created_at' => (new \DateTime()),
                'updated_at' => (new \DateTime()),
            ],
            [
                'id' => 3,
                'hall_id' => 3,
                'title' => 'Симфонія сну',
                'description' => 'Відправтеся у подорож у світ снів, де музика, кольори та танці об\'єднуються в гармонійну симфонію. Ця вистава перенесе вас у реальність сновидінь.',
                'start_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(20, 00),
                'end_at' => (new \DateTime())->add((new \DateInterval('P58D')))->setTime(21, 50),
                'price' => 165,
                'created_at' => (new \DateTime()),
                'updated_at' => (new \DateTime()),
            ],
            [
                'id' => 4,
                'hall_id' => 1,
                'title' => 'Легенди прадавнього лісу',
                'description' => 'Дізнайтеся про захоплюючу виставу \'Легенди прадавнього лісу\', яка вводить глядачів у магічний світ легенд та відьом. Споглядайте, як стародавні оповідання оживають на сцені, де вас очікує пригоди, таємниці та зачарована краса лісового царства. Вражайтеся дотепним сюжетом, талановитою грою акторів та чарівною атмосферою цієї вистави. Купуйте квитки зараз та вирушайте у неповторний світ \'Легенд прадавнього лісу\'.',
                'start_at' => (new \DateTime())->add((new \DateInterval('P59D')))->setTime(19, 45),
                'end_at' => (new \DateTime())->add((new \DateInterval('P59D')))->setTime(21, 40),
                'price' => 160,
                'created_at' => (new \DateTime()),
                'updated_at' => (new \DateTime()),
            ],
        ]);
    }
}
