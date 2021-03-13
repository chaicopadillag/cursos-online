<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platform       = new Platform();
        $platform->name = 'YouTube';
        $platform->save();

        $platform2       = new Platform();
        $platform2->name = 'Vimeo';
        $platform2->save();

    }
}
