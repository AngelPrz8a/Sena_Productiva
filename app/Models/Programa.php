<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function centro(){
        foreach(DB::select(
        'select centro.* from centro
        inner join centroprograma on centroprograma.id_centro = centro.IdCentro
        inner join programa on programa.IdPrograma = centroprograma.id_programa
        where programa.IdPrograma = ?',
        [$this->IdPrograma])
        as $sql){
            return $sql;
        }
    }

}
