<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'pagos';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['id_usuario','pago'];

    // Relacion de Certificado a Usuario

    public function usuario()
    {
      return $this->belongsTo('App\Usuario');
    }

}
