<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaBlog extends Model
{
    protected $table = 'categorias_blog';
    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'categoria_id');
    }
}
