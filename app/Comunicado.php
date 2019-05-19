<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'comunicados';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['titulo','descripcion'];

}
