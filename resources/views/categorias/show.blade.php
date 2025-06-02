<!-- resources/views/categorias/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Vinos de tipo {{ $categoria->Tipo }}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/Vinos.css') }}">
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
        <h1>Vinos de la categoría {{ $categoria->Tipo }}</h1>

        <div class="d-flex justify-content-center mb-3">
            <form action="{{ route('categorias.show', $categoria->idCategoria) }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Buscar vinos..." value="{{ $searchTerm ?? '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        @if ($vinos->count() > 0)
            <div class="row">
                @foreach ($vinos as $vino)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="cursor: pointer;" onclick="window.location.href='{{ route('productosvino.show', $vino->IdVino) }}'">
                            <div class="card-body">
                                <h5 class="card-title">{{ $vino->Nombre }}</h5>
                                <p class="card-text"><small class="text-muted">Categoría: {{ $vino->categoria->Tipo }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay vinos en esta categoría.</p>
        @endif

        <div id="paginacion" class="d-flex justify-content-center mb-3"> 
        <div class="col-3">
        {{ $vinos->links('pagination::bootstrap-4')}}
        </div>
        </div>
    </div>
    

    <a id="btnVolver" class="btn btn-sm btn-primary" href="{{ route('categorias.index') }}">Volver</a>
</body>
</html>