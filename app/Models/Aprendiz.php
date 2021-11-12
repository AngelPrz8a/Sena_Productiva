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
        $sql = DB::select('
        SELECT instructor.IdInstructor from aprendiz
        INNER JOIN ficha on ficha.IdFicha = aprendiz.id_ficha
        INNER JOIN instructorficha on ficha.IdFicha = instructorficha.id_ficha
        INNER JOIN instructor on instructorficha.id_instructor = instructor.IdInstructor
        INNER JOIN usuario on usuario.IdUsuario = instructor.id_usuario
        where aprendiz.id = ?
        GROUP by IdInstructor
        ', [$this->id]);

        $a =[];
        foreach($sql as $i){
            array_push($a, $i->IdInstructor);
        }
        return $a;
    }

    public function i(){
        $sql = DB::select('
        SELECT instructor.* from aprendiz
        INNER JOIN ficha on ficha.IdFicha = aprendiz.id_ficha
        INNER JOIN instructorficha on ficha.IdFicha = instructorficha.id_ficha
        INNER JOIN instructor on instructorficha.id_instructor = instructor.IdInstructor
        INNER JOIN usuario on usuario.IdUsuario = instructor.id_usuario
        where aprendiz.id = ?
        ', [$this->id]);

        foreach($sql as $i){
            return Instructor::find($i->IdInstructor) ;
        }

    }
}
