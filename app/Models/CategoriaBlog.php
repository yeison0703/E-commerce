<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class CategoriaBlog extends Model
{
    use HasFactory;

    protected $table = 'categorias_blog';
    
    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'categoria_id');
    }
    protected $fillable =[
        'nombre', 'descripcion'
    ];


}
