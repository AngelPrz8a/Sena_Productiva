<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Entregables;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ficha extends Model
{
    use HasFactory;
    
     //Vincular MODEL - TABLE (Mysql)
     protected $table = "ficha";
     //Establecer la PK de la entidad (por defecto :ArtistId)
     protected $primaryKey = "id";
     //Omitir Campos de AUDITORIA
     public $timestamps = false;

    public function programa(){
        foreach( DB::select(
            'select programa.* from programa
            inner join ficha on ficha.id_programa = programa.id
            where ficha.id = ?', [$this->id])   as $sql){
                return $sql;
        }
    }

    public function countAprendices(){
        foreach(DB::select(
            'SELECT count(aprendiz.id_ficha) as cuenta FROM ficha
            inner join aprendiz on aprendiz.id_ficha = ficha.id
            where ficha.id = ?'
            , [$this->id])
            as $sql){
            return $sql->cuenta;
         }
    }

    public function aprendices(){
        return $this->hasMany('App\Models\Aprendiz', 'id_ficha', 'id');
    }

    public function instructor(){
        foreach(DB::select(
            'select usuario.*, instructor.* from usuario
            inner join instructor on instructor.id_usuario = usuario.id
            INNER join instructor_ficha on instructor_ficha.id_instructor = instructor.id
            inner join ficha on ficha.id = instructor_ficha.id_ficha
            where ficha.id = ?',
         [$this->id]) as $sql){
            return $sql;
        }//end foreach

    }

    public function momento(){
        /**
        * finalLectiva > hoy        finalLectiva < hoy      finalLectiva < hoy
        * --                        &&                      &&
        * ---------------------     finalProductiva > hoy   finalProductiva < hoy
        * LECTIVA                   PRODUCTIVA              FINALIZO
        */
        $iL = $this->inicioLectiva;
        $fL = $this->finLectiva;

        $iP = $this->inicioProductiva;
        $fP = $this->finProductiva;

        $hoy = Carbon::now();

        //si inicio Lectiva es mayor a hoy o no
        if ($iL > $hoy) {
            return 'No ha Iniciado';
        }
        //si final Lectiva es mayor a hoy o no
        if ($fL > $hoy) {
            return 'Lectiva';
        }

        //si finalizo lectiva y es mayor inicio productiva o no
        if ($iP < $hoy) {
            if ($fL < $hoy && $fP > $hoy) {
                return 'Productiva';
            }
            if ($fL < $hoy && $fP < $hoy) {
                return 'Finalizo Productiva';
            }
        }else{
            return 'Finalizo Lectiva';
        }

    }

}
