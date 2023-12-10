<?php

namespace Database\Seeders;

use App\Models\Aprendiz;
use App\Models\Centro;
use App\Models\User;
use App\Models\Ficha;
use App\Models\Instructor;
use App\Models\InstructorFicha;
use App\Models\Rol;
use App\Models\UsuarioRol;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(["emailPersonal"=>"jangelpochoa@gmail.com"]);

        Rol::factory()->create(["tipo"=>"Aprendiz"]);
        Rol::factory()->create(["tipo"=>"Instructor"]);
        Rol::factory()->create(["tipo"=>"Administrador"]);
        //Ficha::factory(10)->create();
        Centro::factory(3)->create();
        //Instructor::factory(5)->create();
        //InstructorFicha::factory(5)->create(); 
        //Aprendiz::factory(30)->create(); 
        //UsuarioRol::factory(35)->create();

        /**
         * 30 aprendices - 30 usuarios
         * 10 fichas - 10 programas
         * 3 centros
         * 5 instructores - 5 usuarios
         * 3 roles
         */
    }
}
