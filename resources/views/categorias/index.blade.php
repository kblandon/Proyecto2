<!DOCTYPE html>
<html>
<head>
    <title>Categorías</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/Categorias.css') }}">
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

    <h1>Categorías</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-11">
                <div class="card-columns">
                    @foreach ($categorias as $categoria)
                        <div class="card" style="cursor: pointer;max-width: 19rem;" onclick="window.location.href='{{ route('categorias.show', $categoria->idCategoria) }}'">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->Tipo }}</h5>
                                <p class="card-text">{{ $categoria->Descripcion }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
</body>
</html>