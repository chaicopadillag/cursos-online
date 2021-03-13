<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel1       = new Level();
        $nivel1->name = 'Nivel Básico';
        $nivel1->save();

        $nivel2       = new Level();
        $nivel2->name = 'Nivel Intermedio';
        $nivel2->save();

        $nivel3       = new Level();
        $nivel3->name = 'Nivel Avanzado';
        $nivel3->save();

    }
}
