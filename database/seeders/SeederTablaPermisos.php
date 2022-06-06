<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//aqui agregue el model de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aqui solo es para rellenar las tablas de Spatie con los permisos que yo puedo editar
        $permisos = [
            //Tabla de los roles
             'ver-rol',
             'crear-rol',
             'editar-rol',
             'borrar-rol',
            //tabla del modulo recursos Humanos
            'ver-permiso',
            'crear-permiso',
            'editar-permiso',
            'borrar-permiso',
            //tabla de usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

        ];
        foreach($permisos as $permiso){
         Permission::create(['name'=>$permiso]);   
        }

    }
}
