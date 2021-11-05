<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReunionAprendiz extends Model
{
    protected $table = "reunionaprendiz";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'title',
        'Descripcion',
        'start',
        'end',
        'Modalidad',
        'MomentoEleccion',
        'Estado',
    ];

    public function instructor(){
        return $this->hasManyThrough(
            Usuario::class,
            Instructor::class,
            'IdInstructor',
            'IdUsuario',
            'IdInstructor'
        );
    }
}
