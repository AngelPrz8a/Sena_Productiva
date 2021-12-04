<?php

namespace App\Models;

use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aprendiz extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "aprendiz";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;


    //use HasFactory;

    public function usuarios(){
        return $this->hasMany('App\Models\User', 'IdUsuario', 'id_usuario')->first();
    }

    public function fichas(){
        return $this->belongsTo('App\Models\Ficha', 'id_ficha', 'IdFicha')->first();
    }

    public function empresas(){
        $sql =  $this->belongsTo(
            'App\Models\Empresa',
            'id_empresa',
        )->first();
        return $sql;
    }

    public function instructor(){
        foreach( DB::select('
        SELECT instructor.*, usuario.*
        from aprendiz
        INNER JOIN ficha on ficha.IdFicha = aprendiz.id_ficha
        INNER JOIN instructorficha on ficha.IdFicha = instructorficha.id_ficha
        INNER JOIN instructor on instructorficha.id_instructor = instructor.IdInstructor
        INNER JOIN usuario on usuario.IdUsuario = instructor.id_usuario
        where aprendiz.id = ?',
        [$this->id])
        as $sql){
            return Instructor::find($sql->IdInstructor) ;
        }
    }

    public function reuniones(){
        $array = [];
        foreach(DB::SELECT(
            'SELECT reunionaprendiz.* FROM reunionaprendiz
            inner join aprendiz on aprendiz.id = reunionaprendiz.id_aprendiz
            where aprendiz.id = ?',
            [$this->id]
        ) as $sql ){
            array_push($array, ReunionAprendiz::find($sql->id));
        }
        return $array;
    }
}
