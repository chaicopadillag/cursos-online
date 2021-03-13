<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price        = new Price();
        $price->name  = 'Gratis';
        $price->value = 0;
        $price->save();

        $price2        = new Price();
        $price2->name  = '19.99 $ Nivel 1';
        $price2->value = 19.99;
        $price2->save();

        $price3        = new Price();
        $price3->name  = '49.99 $ Nivel 2';
        $price3->value = 49.99;
        $price3->save();

        $price4        = new Price();
        $price4->name  = '99.99 $ Nivel 3';
        $price4->value = 99.99;
        $price4->save();

    }
}
