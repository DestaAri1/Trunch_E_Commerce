<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product::truncate();
        product::create([
            'name' => 'FIMI X8SE',
            'stock' => '20',
            'price' => '6000000',
            'slug' => 'fimi_x8se',
            'img' => 'fimi_x8se.jpg',
            'user_id' => '2'
        ]);
        product::create([
            'name' => 'DIJI MINI 2',
            'stock' => '18',
            'price' => '5500000',
            'slug' => 'diji_mini_2',
            'img' => 'diji_mini_2.jpg',
            'user_id' => '2'
        ]);
        product::create([
            'name' => 'DIJI MINI 3 PRO',
            'stock' => '15',
            'price' => '12000000',
            'slug' => 'diji_mini_3_pro',
            'img' => 'diji_mini_3_pro.jpg',
            'user_id' => '2'
        ]);
    }
}
