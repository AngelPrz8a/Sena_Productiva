<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'IdUsuario';
    public $timestamps = false;




    public function rol(){
        return $this
       ->hasManyThrough(
           Rol::class,         //Primero el modelo al que quiero llegar
           UsuarioRol::class,  //Segundo el modelo intermedio
           'id_usuario',   //FK on the 2 table
           'id',           //FK on the 1 table
           'IdUsuario',           //PK on the model principal
           'id_rol'            //PD on the 2 table
       )
       //->select('usuariorol.id_usuario', 'rol.tipoRol')
       ;
   }
   //end function


/*
//
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
//
    protected $hidden = [
        'password',
        'remember_token',
    ];
//
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//
*/

}//end class
