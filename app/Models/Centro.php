<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centro extends Model
{
    use HasFactory;
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "centro";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    ///////////////////////////////////////
    //FUNCIONES
    ///////////////////////////////////////

    /**
     *consulta los programas afiliados a este centro
     *pasando por la tabla intermedia centroprograma
     */
    public function programas(){
        $array = DB::select(
            'select programa.id, programa.nombre, programa.nivel, programa.estado
            from programa
            inner join centro_programa on centro_programa.id_programa = programa.id
            INNER join centro on centro.id = centro_programa.id_centro
            WHERE centro.id = ? ',
            [$this->id]
        );

        return $array;
    }
    //

    /**
     * consulta los instructores de este centro
     */
    public function instructores(){
        $array = DB::select(
            'SELECT instructor.id, instructor.id_centro, instructor.id_usuario FROM instructor
            INNER JOIN centro on centro.id = instructor.id_centro
            WHERE centro.id = ?',
            [$this->id]
        );

        $a = [];
        foreach($array as $arr){
            array_push($a, Instructor::find($arr->id)  );
        }
        return $a;

    }

}
