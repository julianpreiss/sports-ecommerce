<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'email' => 'julipreiss@hotmail.com',
                'password' => Hash::make('1234'),
                'nombre' =>'Julian',
                'apellido' => 'Preiss',
                'rol_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),               
            ]
            ]);

        DB::table('usuarios')->insert([
            [
                'email' => 'juli@juli.com',
                'password' => Hash::make('asdf'),
                'nombre' =>'Julian',
                'apellido' => 'Gonzales',
                'rol_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),               
            ]
            ]);    

        DB::table('usuarios')->insert([
            [
                'email' => 'tomas@tomas.com',
                'password' => Hash::make('asdf1234'),
                'nombre' =>'Tomacito',
                'apellido' => 'De Nevares',
                'rol_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),               
            ]
            ]);
        DB::table('usuarios')->insert([
            [
                'email' => 'cris@gmail.com',
                'password' => Hash::make('qwerty'),
                'nombre' =>'Cristian',
                'apellido' => 'Calderón',
                'rol_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),               
            ]
            ]);    
    }
}
