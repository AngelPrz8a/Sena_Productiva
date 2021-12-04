<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ficha;
use App\Models\Programa;
use App\Models\Entregables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function programas(){
        $array = [];

        foreach( DB::SELECT(
            'select programa.* from programa
            inner join ficha on ficha.Id_programa = programa.IdPrograma
            INNER JOIN instructorficha on instructorficha.id_ficha = ficha.IdFicha
            INNER JOIN instructor on instructor.IdInstructor = instructorficha.id_instructor
            where instructor.IdInstructor = ?
            GROUP by programa.Nombre, programa.IdPrograma, programa.Nivel, programa.Estado',
            [$this->IdInstructor]
        ) as $sql ){
            array_push($array, Programa::find($sql->IdPrograma));
        }

        return $array;
    }

    public function fichasporprograma($id_programa){
        $array = [];
        foreach( DB::SELECT(
            'SELECT * from ficha
            inner join instructorficha on instructorficha.id_ficha = ficha.IdFicha
            INNER join instructor on instructor.IdInstructor = instructorficha.id_instructor
            inner join programa on programa.IdPrograma = ficha.Id_programa
            where instructor.IdInstructor = ? AND programa.IdPrograma = ?',
            [$this->IdInstructor, $id_programa]
        ) as $sql){
            array_push($array, Ficha::find($sql->IdFicha) );
        }
        return $array;
    }

    public function reuniones(){
        $array = [];
        foreach(DB::SELECT(
            'select reunionaprendiz.* from reunionaprendiz
            inner join instructor on instructor.IdInstructor = reunionaprendiz.id_instructor
            WHERE instructor.IdInstructor = ?
            order by reunionaprendiz.start asc',
            [$this->IdInstructor]
        ) as $sql){
            array_push($array, $sql);
        }
        return $array;
    }

    public function aprendices(){
        $array = [];
        foreach( DB::SELECT(
            'select usuario.*, aprendiz.* from aprendiz
            inner join usuario on usuario.IdUsuario = aprendiz.id_usuario
            inner join ficha on ficha.IdFicha = aprendiz.id_ficha
            inner join instructorficha on instructorficha.id_ficha = ficha.IdFicha
            inner join instructor on instructor.IdInstructor = instructorficha.id_instructor
            where instructor.IdInstructor = ?',
            [$this->IdInstructor]
        ) as $sql){
            array_push(  $array, $sql  );
        }
        return $array;
    }

    public function entregable($id_ficha){
        $array = [];
        foreach(DB::SELECT(
            'select entregables.*
            from entregables
            inner JOIN ficha on ficha.IdFicha = entregables.id_ficha
            where ficha.IdFicha = ?',
            [$id_ficha]
        )
        as $sql){
            array_push($array, Entregables::find($sql->IdEntregables) );
        }
        return $array;
    }
}
