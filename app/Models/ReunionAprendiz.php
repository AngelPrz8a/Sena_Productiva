<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReunionAprendiz extends Model
{
    protected $table = "reunion_aprendiz";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'title',
        'descripcion',
        'start',
        'end',
        'modalidad',
        'momentoEleccion',
        'estado',
        'id_instructor',
        'id_aprendiz'
    ];


    public function instructor(){
        return $this->hasManyThrough(
            Usuario::class,
            Instructor::class,
            'id',
            'id',
            'id'
        );
    }

}
