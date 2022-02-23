<?php

namespace Database\Seeders;    
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nombre' => 'Mini Neo Trainer',
            'marca' => 'Umbro',
            'deporte' => 'Futbol',
            'precio' => 899.99,
            'imagen' => 'umbro.webp',
            'descripcionimg' => 'Pelota de fútbol Mini Neo'
        ]);

        DB::table('productos')->insert([
            'id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nombre' => 'Real Madrid Madridista',
            'marca' => 'Dribbling',
            'deporte' => 'Futbol',
            'precio' => 1490.00,
            'imagen' => 'madrid.webp',
            'descripcionimg' => 'Pelota de fútbol del Real Madrid'
        ]);

        DB::table('productos')->insert([
            'id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nombre' => 'Ufc Finale Estambul',
            'marca' => 'Adidas',
            'deporte' => 'Futbol',
            'precio' => 5999.00,
            'imagen' => 'adidas.webp',
            'descripcionimg' => 'Pelota de fútbol Estambul'
        ]);

        DB::table('productos')->insert([
            'id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nombre' => 'UAR Jaguares Naciones',
            'marca' => 'Gilbert',
            'deporte' => 'Futbol',
            'precio' => 5999.00,
            'imagen' => 'guindapumas.webp',
            'descripcionimg' => 'Guinda de Rugby de los pumas'
        ]);

    }
}
