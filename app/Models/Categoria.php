<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla en la BD

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
