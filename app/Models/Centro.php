<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centro extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "centro";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdCentro";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;


    ///////////////////////////////////////
    //FUNCIONES
    ///////////////////////////////////////

    /**
     *consulta los programas afiliados a este centro
     *pasando por la tabla intermedia centroprograma
     */
    public function programas(){
        $array = DB::select(
            'select programa.IdPrograma, programa.Nombre, programa.Nivel, programa.Estado
            from programa
            inner join centroprograma on centroprograma.id_programa = programa.IdPrograma
            INNER join centro on centro.IdCentro = centroprograma.id_centro
            WHERE centro.IdCentro = ? ',
            [$this->IdCentro]
        );

        return $array;
    }
    //

    /**
     * consulta los instructores de este centro
     */
    public function instructores(){
        $array = DB::select(
            'SELECT instructor.IdInstructor, instructor.id_centro, instructor.id_usuario FROM instructor
            INNER JOIN centro on centro.IdCentro = instructor.id_centro
            WHERE centro.IdCentro = ?',
            [$this->IdCentro]
        );

        $a = [];
        foreach($array as $arr){
            array_push($a, Instructor::find($arr->IdInstructor)  );
        }
        return $a;

    }

}
