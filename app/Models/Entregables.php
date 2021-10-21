<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entregables extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "entregables";
    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdEntregables";
    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    //
    public function instructor(){
        return $this->hasMany(
            'App\Models\Instructor',
            'IdInstructor');
    }
    //



    //
    public function usuario_instructor(){
        return $this->hasManyThrough(
            Usuario::class,
            Instructor::class,
            'IdInstructor',   //FK to Instructor
            'IdUsuario',    //PK to Usuario
            'IdInstructor', //local
            'id_usuario' //to Inner with usuario
        );
    }
    //end function
}
