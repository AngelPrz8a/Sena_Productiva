<?php

namespace App\Models;

use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aprendiz extends Model
{
    use HasFactory;
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "aprendiz";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "id";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;


    public function usuarios()
    {
        return $this->hasMany('App\Models\User', 'id', 'id_usuario')->first();
    }

    public function fichas(): HasOne
    {
        return $this->hasOne(Ficha::class, 'id', "id_ficha");
    }

    public function empresas()
    {
        $sql =  $this->belongsTo(
            'App\Models\Empresa',
            'id_empresa',
        );
        return $sql;
    }

    public function instructor()
    {
        foreach (DB::select(
            '
        SELECT instructor.*, usuario.*
        from aprendiz
        INNER JOIN ficha on ficha.id = aprendiz.id_ficha
        INNER JOIN instructor_ficha on ficha.id = instructor_ficha.id_ficha
        INNER JOIN instructor on instructor_ficha.id_instructor = instructor.id
        INNER JOIN usuario on usuario.id = instructor.id_usuario
        where aprendiz.id = ?',
            [$this->id]
        )
            as $sql) {
            return Instructor::find($sql->id);
        }
    }

    public function reuniones()
    {
        $array = [];
        foreach (DB::SELECT(
            'SELECT reunion_aprendiz.* FROM reunion_aprendiz
            inner join aprendiz on aprendiz.id = reunion_aprendiz.id_aprendiz
            where aprendiz.id = ?',
            [$this->id]
        ) as $sql) {
            array_push($array, ReunionAprendiz::find($sql->id));
        }
        return $array;
    }
}
