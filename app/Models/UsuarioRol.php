<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
   use HasFactory;
   //Vincular MODEL - TABLE (Mysql)
   protected $table = "usuario_rol";

   //Establecer la PK de la entidad (por defecto :ArtistId)
   protected $primaryKey = "Id";

   //Omitir Campos de AUDITORIA
   public $timestamps = false;

   //use HasFactory;

}
