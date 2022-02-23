<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert(
            [
                'id' => 1,
                'imagen' => 'pelotas-tenis-amarillas.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'titulo' => 'Ideas para reutilizar pelotas de tenis',
                'preview' => '¿Qué podemos hacer con nuestras pelotas de pádel o tenis usadas? Te damos ideas para reutilizarlas',
                'articulo' => '<h3>Vuelve a meterles presión con un bote presurizador</h3><p>Uno de los artículos que se han puesto de moda en las últimas fechas y que cada vez son más vistos son los botes presurizadores. En el mercado existen tienes una gran variedad de modelos para elegir. De hecho, en este artículo os hablamos de los principales presurizadores que hay, sus precios y dónde puedes comprarlos. Pueden parecer a priori algo costoso, pero si echas cálculos en pocos meses lo tendrás amortizado.</p><h3>Para reducir el ruido de las patas de las sillas</h3><p>Si eres profesor, ¿te imaginas que pudieras olvidarte del molesto ruido que forman tus alumnos cuando arrastran las sillas por el suelo? Y si eres estudiante, ¿sabes lo que sería poder estudiar sin ese molesto ruido que se forman en las bibliotecas al mover los asientos? En este último caso la Federación Aragonesa de Tenis anunció que en algunas universidades de Zaragoza ya se está haciendo.</p><h3>Para darse masajes</h3><p>¿Y si te dijera que podemos volver a usar las pelotas con fines terapéuticos? En el canal de YouTube de FisioOnline han publicado una serie de consejos de cómo podemos usar las pelotas de pádel o tenis para aliviar ciertas zonas de nuestro cuerpo.</p>',
            ]);
            DB::table('articulos')->insert(
            [
            'id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'titulo' => 'Las pelotas de Adidas',
            'preview' => 'La pelota es uno de los elementos más importantes en varios deportes y es por ello que en adidas puedes encontrar una gran oferta.',
            'articulo' => '<p>La pelota es uno de los elementos más importantes en varios deportes y es por ello que en adidas puedes encontrar una gran oferta.</p>
            <p>Ya sean de fútbol, fútbol sala, basquet, rugby o balonmano, en todos los casos se han incorporado los últimos avances tecnológicos a los modelos más vanguardistas. Las pelotas adidas están fabricadas con los mejores materiales y en muchos casos con cubiertas TPU y sin costuras para que sean más resistentes. Esto hace que los modelos de mayor gama sean incluso los elegidos en muchas competiciones oficiales de fútbol y tengan el certificado de calidad FIFA Quality. Niños, mujeres y hombres pueden sacar partido a todas estas pelotas de diferente tamaño y peso que se adaptan a cada necesidad.</p>',
            ]);

        DB::table('articulos_tienen_tematicas')->insert([
            [
                'id' => 2,
                'tematica_id'=> 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);

            DB::table('articulos_tienen_tematicas')->insert([
            [
                'id' => 1,
                'tematica_id'=> 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('articulos_tienen_tematicas')->insert([
            [
                'id' => 1,
                'tematica_id'=> 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('articulos_tienen_tematicas')->insert([
            [
                'id' => 2,
                'tematica_id'=> 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
