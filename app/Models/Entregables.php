<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregables extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "entregables";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdEntregables";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    public function instructor(){
        return $this->hasMany('App\Models\Instructor', 'IdInstructor');
    }
}
