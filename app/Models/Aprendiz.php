<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\Models\Usuario', 'IdUsuario', 'id_usuario');
    }

    public function fichas(){
        return $this->belongsTo('App\Models\Ficha', 'id_ficha', 'IdFicha');
    }
}
