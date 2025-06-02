<?php

namespace App\Http\Controllers;

use App\Models\ProductoVino;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoVinoController extends Controller
{
    public function index()
    {
        $productos = ProductoVino::paginate(5);
        return view('productosvino.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
        return view('productosvino.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
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

        ProductoVino::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    public function show(ProductoVino $productoVino)
    {
        return view('productosvino.show', compact('productoVino'));
    }

    public function edit(ProductoVino $productoVino)
    {
        $categorias = Categoria::all();
        return view('productosvino.edit', compact('productoVino', 'categorias'));
    }

    public function update(Request $request, ProductoVino $productoVino)
    {
        $request->validate([
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

        $productoVino->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(ProductoVino $productoVino)
    {
        $productoVino->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}
