<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "rol";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;
}
