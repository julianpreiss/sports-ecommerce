<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tematicas')->insert([
            [
                'tematica_id' => 1,
                'categoria' => 'Futbol',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
            ],
            [
                'tematica_id' => 2,
                'categoria' => 'Basket',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
            ],
            [
                'tematica_id' => 3,
                'categoria' => 'Tenis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
            ],
            [
                'tematica_id' => 4,
                'categoria' => 'Pelotas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
            ],
            [
                'tematica_id' => 5,
                'categoria' => 'Indumentaria deportiva',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
            ],

        ]);
    }
}
