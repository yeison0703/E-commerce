<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Articulo extends Model
{

    
    protected $table = 'articulos';
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen_destacada',
        'autor',
        'categoria_id',
        'fecha_publicacion',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaBlog::class, 'categoria_id');
}
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
