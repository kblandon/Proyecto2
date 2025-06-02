<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Vinos</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/Vinos.css') }}">
</head>
<body>
    
<nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a id="Logo" class="navbar-brand" href="/">Tienda de Vinos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('categorias.index') }}">Inicio</span></a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5 mb-4">Lista de Vinos</h1>

        <a class="btn btn-sm btn-primary" href="{{ route('productosvino.create') }}">Agregar Nuevo Vino</a>
        <table class="table table-striped" style="margin-top:1%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Bodega</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->Nombre }}</td>
                        <td>{{ $producto->Bodega }}</td>
                        <td><a  href="{{ route('categorias.show', $producto->categoria) }}">{{ $producto->categoria ? $producto->categoria->Tipo : 'Sin Categoría' }}</a></td>
                        <td>${{ $producto->Precio }}</td>
                        <td>
                            <a href="{{ route('productosvino.show', $producto->IdVino) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('productosvino.edit', $producto->IdVino) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('productosvino.destroy', $producto->IdVino) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    <div id="paginacion" class="row justify-content-center"> 
        <div class="col-3">
        {{ $productos->links('pagination::bootstrap-4')}}
        </div>
    </div>
</body>
</html>