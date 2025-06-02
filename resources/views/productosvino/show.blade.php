<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/VinoDetalle.css') }}">
</head>
<body>

<nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a id="Logo" class="navbar-brand" href="{{ route('categorias.index') }}">Tienda de Vinos</a>
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
        <h1 class="mt-5 mb-4">Detalles del Vino</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $productoVino->Nombre }}</h5>
                <p class="card-text">Bodega: {{ $productoVino->Bodega }}</p>
                <p class="card-text">Categoría: {{ $productoVino->categoria ? $productoVino->categoria->Tipo : 'Sin Categoría' }}</p>
                <p class="card-text">Variedad de Uva: {{ $productoVino->Variedad_Uva }}</p>
                <p class="card-text">Región: {{ $productoVino->Region }}</p>
                <p class="card-text">Anada: {{ $productoVino->Anada }}</p>
                <p class="card-text">Afrutado: {{ $productoVino->Afrutado }}</p>
                <p class="card-text">Acidez: {{ $productoVino->Acidez }}</p>
                <p class="card-text">Taninos: {{ $productoVino->Taninos }}</p>
                <p class="card-text">Cuerpo: {{ $productoVino->Cuerpo }}</p>
                <p class="card-text">Maridaje Recomendado: {{ $productoVino->Maridaje_Recomendado }}</p>
                <p class="card-text">Precio: ${{ $productoVino->Precio }}</p>
            </div>
        </div>
    </div>
    </br>
    <div id="boxBotones" class="container">
        <div class="d-flex justify-content-center mb-5">
            <a id="Botones" type="button" class="btn btn-success" href="{{ route('categorias.show', $productoVino->categoria) }}">Volver</a>
            <a id="Botones" type="button" class="btn btn-primary" href="{{ route('productosvino.create')}}">Agregar nuevo</a>
            <a id="Botones" type="button" class="btn btn-warning" href="{{ route('productosvino.edit', $productoVino->IdVino) }}" >Editar</a>
            <form action="{{ route('productosvino.destroy', $productoVino->IdVino) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>