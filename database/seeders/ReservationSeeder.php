<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('reservations')->insert([
         [ 
            'user_id' => 1,
            'menu_id' => 1, 
            'number_of_people' => 1,
         ],
         [
           'user_id' => 1,
           'menu_id' => 2, 
           'number_of_people' => 1,
         ],
        ]);
    }
}
