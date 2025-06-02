<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Tipo' => 'required',
            'Descripcion' => 'required',
            'Caracteristicas_Generales' => 'required',
            'Temperatura_Servicio_Recomendada' => 'required',
            'Maridaje_General' => 'required',
        ]);

        $categoria = Categoria::create($validated);

        return response()->json(['message' => 'Categoría creada exitosamente.', 'data' => $categoria], 201);
    }

    public function show(Categoria $categoria, Request $request)
    {
        $searchTerm = $request->input('search');

        $vinos = $categoria->productosvino()
            ->with('categoria')
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('nombre', 'like', '%' . $searchTerm . '%')
                      ->orWhere('descripcion', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(5);

        return response()->json([
            'categoria' => $categoria,
            'vinos' => $vinos,
            'search' => $searchTerm,
        ]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'Tipo' => 'required',
            'Descripcion' => 'required',
            'Caracteristicas_Generales' => 'required',
            'Temperatura_Servicio_Recomendada' => 'required',
            'Maridaje_General' => 'required',
        ]);

        $categoria->update($validated);

        return response()->json(['message' => 'Categoría actualizada exitosamente.', 'data' => $categoria]);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente.']);
    }
}
