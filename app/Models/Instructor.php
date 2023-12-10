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
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instructor extends Model
{
    use HasFactory;
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "instructor";
    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";
    //Omitir Campos de AUDITORIA
    public $timestamps = false;


    public function usuarios():HasOne{
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function centro(){
        return $this->hasOne(
            Centro::class,
            'id',
            'id_centro'
        )->get();
    }

    public function fichas(){
        $array = [];
        foreach( DB::select(
                'select ficha.* from ficha
                inner join instructor_ficha on instructor_ficha.id_ficha = ficha.id
                INNER JOIN instructor on instructor_ficha.id_instructor = instructor.id
                where instructor.id = ?',
                [$this->id]
                )
            as $sql){
                array_push($array, Ficha::find($sql->id));
            }
        return $array;
    }

    public function fichaSinInstructor(){
        $fichas = DB::select(
            'SELECT ficha.* FROM ficha
            left join instructor_ficha on instructor_ficha.id_ficha = ficha.id
            where instructor_ficha.id_ficha is null'
        );

        return $fichas;
    }

    public function programas(){
        $array = [];

        foreach( DB::SELECT(
            'select programa.* from programa
            inner join ficha on ficha.id_programa = programa.id
            INNER JOIN instructor_ficha on instructor_ficha.id_ficha = ficha.id
            INNER JOIN instructor on instructor.id = instructor_ficha.id_instructor
            where instructor.id = ?
            GROUP by programa.nombre, programa.id, programa.nivel, programa.estado',
            [$this->id]
        ) as $sql ){
            array_push($array, Programa::find($sql->id));
        }

        return $array;
    }

    public function fichasporprograma($id_programa){
        $array = [];
        foreach( DB::SELECT(
            'SELECT * from ficha
            inner join instructor_ficha on instructor_ficha.id_ficha = ficha.id
            INNER join instructor on instructor.id = instructor_ficha.id_instructor
            inner join programa on programa.id = ficha.id_programa
            where instructor.id = ? AND programa.id = ?',
            [$this->id, $id_programa]
        ) as $sql){
            array_push($array, Ficha::find($sql->id) );
        }
        return $array;
    }

    public function reuniones(){
        $array = [];
        foreach(DB::SELECT(
            'select reunion_aprendiz.* from reunion_aprendiz
            inner join instructor on instructor.id = reunion_aprendiz.id_instructor
            WHERE instructor.id = ?
            order by reunion_aprendiz.start asc',
            [$this->id]
        ) as $sql){
            array_push($array, $sql);
        }
        return $array;
    }

    public function aprendices(){
        $array = [];
        foreach( DB::SELECT(
            'select usuario.*, aprendiz.* from aprendiz
            inner join usuario on usuario.id = aprendiz.id_usuario
            inner join ficha on ficha.id = aprendiz.id_ficha
            inner join instructor_ficha on instructor_ficha.id_ficha = ficha.id
            inner join instructor on instructor.id = instructor_ficha.id_instructor
            where instructor.id = ?',
            [$this->id]
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
            inner JOIN ficha on ficha.id = entregables.id_ficha
            where ficha.id = ?',
            [$id_ficha]
        )
        as $sql){
            array_push($array, Entregables::find($sql->id) );
        }
        return $array;
    }
}
