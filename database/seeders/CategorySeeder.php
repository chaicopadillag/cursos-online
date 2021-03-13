<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category       = new Category();
        $category->name = 'Desarrollo Web';
        $category->save();

        $category2       = new Category();
        $category2->name = 'Diseño Web';
        $category2->save();


        $category3       = new Category();
        $category3->name = 'Diseño Grafico';
        $category3->save();


        $category4       = new Category();
        $category4->name = 'Desarrollo Personal';
        $category4->save();


    }
}
