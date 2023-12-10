<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{

    protected $table = "empresa";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function aprendiz(){
        foreach( DB::select(
        'SELECT usuario.*, aprendiz.* FROM usuario
        inner join aprendiz on aprendiz.id_usuario = usuario.id
        inner join empresa on empresa.id = aprendiz.id_empresa
        where empresa.id = ?',
        [$this->id]
        )  as $sql){
            
        }
    }
}
