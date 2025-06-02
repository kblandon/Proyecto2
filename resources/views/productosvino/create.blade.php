<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/VinoCreate.css') }}">
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
        <div class="card mt-5"> 
            <div class="card-body"> <!-- Cuerpo del card para el contenido -->
            <h1 class="card-title">Crear Vino</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </br>
                <form action="{{ route('productosvino.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Bodega" class="form-label">Bodega</label>
                        <input type="text" class="form-control" id="Bodega" name="Bodega" value="{{ old('Bodega') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="idCategoria" class="form-label">Categoría</label>
                        <select class="form-control" id="idCategoria" name="idCategoria" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->idCategoria }}" {{ old('idCategoria') == $categoria->idCategoria ? 'selected' : '' }}>
                                    {{ $categoria->Tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Variedad_Uva" class="form-label">Variedad de Uva</label>
                        <input type="text" class="form-control" id="Variedad_Uva" name="Variedad_Uva" value="{{ old('Variedad_Uva') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Region" class="form-label">Región</label>
                        <input type="text" class="form-control" id="Region" name="Region" value="{{ old('Region') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Anada" class="form-label">Anada</label>
                        <input type="text" class="form-control" id="Anada" name="Anada" value="{{ old('Anada') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Afrutado" class="form-label">Afrutado</label>
                        <input type="text" class="form-control" id="Afrutado" name="Afrutado" value="{{ old('Afrutado') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Acidez" class="form-label">Acidez</label>
                        <input type="text" class="form-control" id="Acidez" name="Acidez" value="{{ old('Acidez') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Taninos" class="form-label">Taninos</label>
                        <input type="text" class="form-control" id="Taninos" name="Taninos" value="{{ old('Taninos') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Cuerpo" class="form-label">Cuerpo</label>
                        <input type="text" class="form-control" id="Cuerpo" name="Cuerpo" value="{{ old('Cuerpo') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Maridaje_Recomendado" class="form-label">Maridaje Recomendado</label>
                        <input type="text" class="form-control" id="Maridaje_Recomendado" name="Maridaje_Recomendado" value="{{ old('Maridaje_Recomendado') }}">
                    </div>

                    <div class="mb-3">
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" value="{{ old('Precio') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div> 
        </div>  
    </div>

</body>
</html>