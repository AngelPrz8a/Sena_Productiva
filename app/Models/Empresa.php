<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "empresa";
    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdEmpresa";
    //Omitir Campos de AUDITORIA
    public $timestamps = false;
}
