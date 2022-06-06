<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 

    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine="InnoDB";

            // $table->id();
            $table->string('id')->primary()->nullable();
            $table->string('nombreEmpleado')->nullable();
            $table->string('telefonoEmpleado')->nullable();
            $table->string('numIdentidadEmpleado')->nullable();
         
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
