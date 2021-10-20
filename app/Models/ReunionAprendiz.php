<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReunionAprendiz extends Model
{

    protected $table = "reunionaprendiz";
    protected $primaryKey = "IdReunionAprendices";
    public $timestamps = false;

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
