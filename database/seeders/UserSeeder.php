<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $user           = new User();
        // $user->name     = 'Code Codero';
        // $user->email    = 'codecodero@dev.team';
        // $user->password = bcrypt('123456');
        // $user->save();
        $user = User::create([
            'name'     => 'Gerard Chaico',
            'email'    => 'chaicopadillag@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
