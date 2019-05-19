<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'fases';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['nombre','descripcion','fechafin','habilitado'];

}
