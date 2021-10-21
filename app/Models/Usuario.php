<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //Vincular MODEL - TABLE (Mysql)
    protected $table = "usuario";

    //Establecer la PK de la entidad (por defecto :ArtistId)
    protected $primaryKey = "IdUsuario";

    //Omitir Campos de AUDITORIA
    public $timestamps = false;

    //use HasFactory;

    /////////////////////////////////////////////
        //Prueba join - roles
        /*
        public function rol(/*$id){
            return $this->leftJoin('usuariorol', 'usuario.IdUsuario', '=', 'usuariorol.id_usuario')
                ->leftJoin('rol', 'usuariorol.id_rol', '=', 'rol.id')
                ->select('usuario.IdUsuario', 'rol.tipoRol')
                //->where('IdUsuario', '=', $id)
                ->get();
        }
        */
    /////////////////////////////////////////////




    /////////////////////////////////////////////
    /*
    public function rol(){
        return $this
        ->hasManyThrough(
            Rol::class,         //Primero el modelo al que quiero llegar
            UsuarioRol::class,  //Segundo el modelo intermedio
            'id_rol',   //FK on the 2 table
            'id',           //FK on the 1 table
            'IdUsuario',           //PK on the model principal
            'id_usuario'            //PD on the 2 table
        )
        ->select('Nombre', 'Apellido');
    }
    */
    /////////////////////////////////////////////

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

}//end class
