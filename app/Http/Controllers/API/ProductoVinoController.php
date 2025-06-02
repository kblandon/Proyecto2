<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductoVino;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoVinoController extends Controller
{
    public function index()
    {
        $productos = ProductoVino::with('categoria')->paginate(5);
        return response()->json($productos, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required',
            'Bodega' => 'required',
            'idCategoria' => 'required|exists:Categorias,idCategoria',
            'Variedad_Uva' => 'required',
            'Region' => 'required',
            'Anada' => 'nullable',
            'Afrutado' => 'nullable',
            'Acidez' => 'nullable',
            'Taninos' => 'nullable',
            'Cuerpo' => 'nullable',
            'Maridaje_Recomendado' => 'nullable',
            'Precio' => 'nullable|numeric',
        ]);

        $producto = ProductoVino::create($validated);

        return response()->json(['message' => 'Producto creado exitosamente.', 'data' => $producto], 201);
    }

    public function show($id)
    {
         $productoVino = ProductoVino::with('categoria')->find($id);

        if (!$productoVino) {
            return response()->json(['message' => 'Vino no encontrado'], 404);
        }

        return response()->json($productoVino, 200);
    }

    public function update(Request $request, ProductoVino $productoVino)
    {
        $validated = $request->validate([
            'Nombre' => 'required',
            'Bodega' => 'required',
            'idCategoria' => 'required|exists:Categorias,idCategoria',
            'Variedad_Uva' => 'required',
            'Region' => 'required',
            'Anada' => 'nullable',
            'Afrutado' => 'nullable',
            'Acidez' => 'nullable',
            'Taninos' => 'nullable',
            'Cuerpo' => 'nullable',
            'Maridaje_Recomendado' => 'nullable',
            'Precio' => 'nullable|numeric',
        ]);

        $productoVino->update($validated);

        return response()->json(['message' => 'Producto actualizado exitosamente.', 'data' => $productoVino]);
    }

    public function destroy($id)
    {
         $producto = ProductoVino::findOrFail($id);
         $producto->delete();
         return response()->json(['message' => 'Producto eliminado.'], 200);
    }
}
