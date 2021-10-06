<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
     //Vincular MODEL - TABLE (Mysql)
     protected $table = "ficha";

     //Establecer la PK de la entidad (por defecto :ArtistId)
     protected $primaryKey = "IdFicha";

     //Omitir Campos de AUDITORIA
     public $timestamps = false;

    //use HasFactory;

    public function programa(){
        return $this->hasMany('App\Models\Programa', 'IdPrograma', 'Id_programa');
    }

    public function aprendices(){
        return $this->hasMany('App\Models\Aprendiz', 'id_ficha', 'IdFicha');
    }
}
