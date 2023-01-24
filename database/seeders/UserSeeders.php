<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Desta Ari Alfananda',
            'email' => 'desta.ari@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('destaari'),
        ]);
        User::create([
            'name' => 'Desta',
            'email' => 'desta@gmail.com',
            'level' => 'seller',
            'password' => bcrypt('destaari'),
        ]);
        User::create([
            'name' => 'Desta',
            'email' => 'destacya@gmail.com',
            'level' => 'user',
            'password' => bcrypt('destaari'),
        ]);
    }
}
