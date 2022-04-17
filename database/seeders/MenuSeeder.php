<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'staple_food' => '米飯',
                'main_dish' => 'ハンバーグ',
                'side_dish' => '健康サラダ',
                'soup' => 'ミネストローネ',
                'fruit' => 'アップル',
                'day_date' => '2022-4-23',
                'max_people' => 100,
                
            ],

            [
                'staple_food' => '米飯',
                'main_dish' => 'カレー',
                'side_dish' => '健康サラダ2',
                'soup' => 'オニオンスープ',
                'fruit' => 'キウイ',
                'day_date' => '2022-4-24',
                'max_people' => 100,
                
            ],

            [
                'staple_food' => 'パン',
                'main_dish' => 'ビーフシチュー',
                'side_dish' => '健康サラダ3',
                'soup' => '味噌汁',
                'fruit' => 'トマト',
                'day_date' => '2022-4-28',
                'max_people' => 100,
                
            ],
            
        ]);
    }
}
