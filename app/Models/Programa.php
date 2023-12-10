<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programa extends Model
{
    // Si no está activo se evita que se pueda llamar el factory
    use HasFactory;

    //Vincular MODEL - TABLE (Mysql)
    protected $table = "programa";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    public function fichas(){
        return $this->hasMany('App\Models\Ficha', 'id');
    }

    public function centro(){
        foreach(DB::select(
        'select centro.* from centro
        left join centro_programa on centro_programa.id_centro = centro.id
        left join programa on programa.id = centro_programa.id_programa
        where programa.id = ?',
        [$this->id])
        as $sql){
            return $sql;
        }
    }

}
