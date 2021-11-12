<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        foreach( DB::select(
            'select programa.* from programa
            inner join ficha on ficha.id_programa = programa.IdPrograma
            where ficha.IdFicha = ?', [$this->IdFicha])   as $sql){
                return $sql;
        }
    }

    public function countAprendices(){
        foreach(DB::select(
            'SELECT count(aprendiz.id_ficha) as cuenta FROM ficha
            inner join aprendiz on aprendiz.id_ficha = ficha.IdFicha
            where ficha.IdFicha = ?'
            , [$this->IdFicha])
            as $sql){
            return $sql->cuenta;
         }
    }

    public function aprendices(){
        return $this->hasMany('App\Models\Aprendiz', 'id_ficha', 'IdFicha');
    }


    public function instructor(){
        foreach(DB::select(
            'select usuario.*, instructor.* from usuario
            inner join instructor on instructor.id_usuario = usuario.IdUsuario
            INNER join instructorficha on instructorficha.id_instructor = instructor.IdInstructor
            inner join ficha on ficha.IdFicha = instructorficha.id_ficha
            where ficha.IdFicha = ?',
         [$this->IdFicha]) as $sql){
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
        $iL = $this->InicioLectiva;
        $fL = $this->FinLectiva;

        $iP = $this->InicioProductiva;
        $fP = $this->FinProductiva;

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
