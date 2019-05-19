<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{

	//Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'profesores';

    protected $primaryKey = 'id';
    

    // Mostrar datos

    protected $fillable = ['name','tipo_documento','num_documento','fec_nac','institucion','vinculacion','asociacion','email','password'];

    
    //Buscador de Jurado
    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'LIKE', '%'.$name.'%');
    }

}
