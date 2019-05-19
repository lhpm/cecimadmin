<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'certificados';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['id_usuario','url','habilitado'];

    // Relacion de Certificado a Usuario

    public function usuario()
    {
      return $this->belongsTo('App\Usuario');
    }

}
