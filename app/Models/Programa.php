<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "programa";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdPrograma";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    public function fichas(){
        return $this->hasMany('App\Models\Ficha', 'Id_programa');
    }
}
