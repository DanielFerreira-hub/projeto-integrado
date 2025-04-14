<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            ['name' => 'Room 101', 'location_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Room 102', 'location_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Room 201', 'location_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Room 202', 'location_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
