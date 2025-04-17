<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    public function categoria()
    {
        return $this->belongsTo(CategoriaBlog::class, 'categoria_id');
}
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
