<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'preguntas';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['id_fase','criterio','puntos'];

}
