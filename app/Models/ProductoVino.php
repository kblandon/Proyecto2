<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoVino extends Model
{
    use HasFactory;
    
   protected $table = 'Producto_Vino'; // Especifica el nombre de la tabla
    protected $primaryKey = 'IdVino'; // Especifica la clave primaria
    //public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'Nombre',
        'Bodega',
        'idCategoria',
        'Variedad_Uva',
        'Region',
        'Anada',
        'Afrutado',
        'Acidez',
        'Taninos',
        'Cuerpo',
        'Maridaje_Recomendado',
        'Precio',
    ];

    // Relación con Categoria (un producto pertenece a una categoría)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
