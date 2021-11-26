<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{

    protected $table = "empresa";
    protected $primaryKey = "IdEmpresa";
    public $timestamps = false;

    public function aprendiz(){
        foreach( DB::select(
        'SELECT usuario.*, aprendiz.* FROM usuario
        inner join aprendiz on aprendiz.id_usuario = usuario.IdUsuario
        inner join empresa on empresa.IdEmpresa = aprendiz.id_empresa
        where empresa.IdEmpresa = ?',
        [$this->IdEmpresa]
        )  as $sql){
            
        }
    }
}
