<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ProductoVino;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tipo' => 'required',
            'Descripcion' => 'required',
            'Caracteristicas_Generales' => 'required',
            'Temperatura_Servicio_Recomendada' => 'required',
            'Maridaje_General' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Categoria $categoria, Request $request)
    {
        $searchTerm = $request->input('search');

        $vinos = $categoria
        ->productosvino()
        ->with('categoria')
        ->when($searchTerm, function ($query, $searchTerm) { 
            $query->where('nombre', 'like', '%' . $searchTerm . '%')
                    ->orWhere('descripcion', 'like', '%' . $searchTerm . '%');
        })
        ->paginate(5);

        $vinos->appends(['search' => $searchTerm]);

        return view('categorias.show', compact('categoria', 'vinos', 'searchTerm'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'Tipo' => 'required',
            'Descripcion' => 'required',
            'Caracteristicas_Generales' => 'required',
            'Temperatura_Servicio_Recomendada' => 'required',
            'Maridaje_General' => 'required',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada exitosamente.');
    }
    
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría eliminada exitosamente.');
    }
}
