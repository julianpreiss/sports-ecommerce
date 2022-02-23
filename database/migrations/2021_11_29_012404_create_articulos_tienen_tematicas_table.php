<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTienenTematicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_tienen_tematicas', function (Blueprint $table) {
            $table->foreignId('id')->constrained('articulos', 'id');
            $table->unsignedSmallInteger('tematica_id');
            $table->foreign('tematica_id')->references('tematica_id')->on('tematicas');
            $table->timestamps();
            $table->primary((['id', 'tematica_id']));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_tienen_tematicas');
    }
}
