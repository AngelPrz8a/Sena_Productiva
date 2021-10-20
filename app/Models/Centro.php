<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "centro";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdCentro";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;
}
