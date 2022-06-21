<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAveriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_averias', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente')->nullable();
            $table->string('numeroDeLinea')->nullable();
            $table->string('contacto')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fechaDeSolicitud')->nullable();
            $table->string('estadoAveria')->nullable();
            $table->string('Megas')->nullable();
            $table->string('numerodearmario')->nullable();
            $table->string('cajaterminal')->nullable();
            $table->string('bornes')->nullable();
            $table->timestamps();
            //$table->timestamps('delete_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_averias');
    }
}
