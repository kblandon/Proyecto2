<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'Categorias'; // Especifica el nombre de la tabla
    protected $primaryKey = 'idCategoria'; // Especifica la clave primaria
    public $timestamps = false; // Desactiva los timestamps (created_at, updated_at) si no los usas

    protected $fillable = [
        'Tipo',
        'Descripcion',
        'Caracteristicas_Generales',
        'Temperatura_Servicio_Recomendada',
        'Maridaje_General',
    ];

    // Relación con ProductoVino (una categoría tiene muchos productos)
    public function productosVino()
    {
        return $this->hasMany(ProductoVino::class, 'idCategoria', 'idCategoria');
    }
}
