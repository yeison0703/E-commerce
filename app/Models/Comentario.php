<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'articulo_id',
        'nombre_usuario',
        'email',
        'contenido',
    ];
    protected $table = 'comentarios';
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
