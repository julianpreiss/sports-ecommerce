<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagos')->insert([
                'id' => 1,
                'idusuario' => 2,
                'idproducto' => 1,
                'unidades' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        DB::table('pagos')->insert([
                'id' => 2,
                'idusuario' => 2,
                'idproducto' => 2,
                'unidades' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),            
            ]);

        DB::table('pagos')->insert([
                'id' => 3,
                'idusuario' => 4,
                'idproducto' => 3,
                'unidades' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),          
            ]);

        DB::table('pagos')->insert([
                'id' => 4,
                'idusuario' => 3,
                'idproducto' => 4,
                'unidades' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        
    }
}
