<?php

namespace App\Models;

use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entregables extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "entregables";
    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";
    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    //
    public function instructor(){
        return $this->hasMany(
            'App\Models\Instructor',
            'id');
    }
    //


    //
    public function usuario_instructor(){
        return $this->hasManyThrough(
            Usuario::class,
            Instructor::class,
            'id',   //FK to Instructor
            'id',    //PK to Usuario
            'id', //local
            'id_usuario' //to Inner with usuario
        );
    }
    //


    //
    public function ficha(){
        foreach(
        DB::select(
            'SELECT ficha.* FROM FICHA
            INNER JOIN entregables on entregables.id_ficha = ficha.id
            WHERE id = ?',
            [ $this->id ])
        as $sql){
            return Ficha::find($sql->id);
        }
    }
    //

}
