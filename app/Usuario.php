<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'users';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['name','tipo_documento','num_documento','fec_nac','institucion','vinculacion','asociacion','email','password'];


    // Relacion de Usuario a Trabajos

    public function trabajos()
    {
        // Especifico la llave foránea id_usuario
        return $this->hasMany('App\Trabajo','id_usuario');
    }

    public function certificados()
    {
        // Especifico la llave foránea id_usuario
        return $this->hasOne('App\Certificado','id_usuario');
    }

    public function pagos()
    {
        // Especifico la llave foránea id_usuario
        return $this->hasOne('App\Pago','id_usuario');
    }

    // Prueba en consola tinke User::find(1)->compras

    //Buscador de Usuarios Alumnos
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }
}
