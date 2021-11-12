<?php

namespace App\Models;

use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "instructor";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdInstructor";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    public function usuarios(){
        return $this->hasMany('App\Models\User', 'IdUsuario', 'id_usuario')->get();
    }

    public function centro(){
        return $this->hasOne(
            Centro::class,
            'IdCentro',
            'id_centro'
        )->get();
    }

    public function fichas(){
        $array = [];
        foreach( DB::select(
                'select ficha.* from ficha
                inner join instructorficha on instructorficha.id_ficha = ficha.IdFicha
                INNER JOIN instructor on instructorficha.id_instructor = instructor.IdInstructor
                where instructor.IdInstructor = ?',
                [$this->IdInstructor]
                )
            as $sql){
                array_push($array, Ficha::find($sql->IdFicha));
            }
        return $array;
    }

    public function fichaSinInstructor(){
        $fichas = DB::select(
            'SELECT ficha.* FROM ficha
            left join instructorficha on instructorficha.id_ficha = ficha.IdFicha
            where instructorficha.id_ficha is null'
        );

        return $fichas;
    }

}
