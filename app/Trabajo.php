<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    //Nombre de la tabla por si cambiamo el nombre en mysql

    protected $table = 'trabajos';

    protected $primaryKey = 'id';

     /**
     * Los atributos que son asignados en masa
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario', 'descripcion', 'calificacion', 'comentario', 'pdf'
    ];

    // relacion inversa Compras a Usuario

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
