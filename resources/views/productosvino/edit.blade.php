<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/VinoEdit.css') }}">
    
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
        <div class="card mt-5 mi-card">
            <div class="card-body">
            <h1 class="card-title">Editar Vino</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('productosvino.update', $productoVino->IdVino) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $productoVino->Nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Bodega" class="form-label">Bodega</label>
                        <input type="text" class="form-control" id="Bodega" name="Bodega" value="{{ $productoVino->Bodega }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="idCategoria" class="form-label">Categoría</label>
                        <select class="form-control" id="idCategoria" name="idCategoria" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->idCategoria }}" {{ $productoVino->idCategoria == $categoria->idCategoria ? 'selected' : '' }}>
                                    {{ $categoria->Tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Variedad_Uva" class="form-label">Variedad de Uva</label>
                        <input type="text" class="form-control" id="Variedad_Uva" name="Variedad_Uva" value="{{ $productoVino->Variedad_Uva }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Region" class="form-label">Región</label>
                        <input type="text" class="form-control" id="Region" name="Region" value="{{ $productoVino->Region }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Anada" class="form-label">Anada</label>
                        <input type="text" class="form-control" id="Anada" name="Anada" value="{{ $productoVino->Anada }}">
                    </div>

                    <div class="mb-3">
                        <label for="Afrutado" class="form-label">Afrutado</label>
                        <input type="text" class="form-control" id="Afrutado" name="Afrutado" value="{{ $productoVino->Afrutado }}">
                    </div>

                    <div class="mb-3">
                        <label for="Acidez" class="form-label">Acidez</label>
                        <input type="text" class="form-control" id="Acidez" name="Acidez" value="{{ $productoVino->Acidez }}">
                    </div>

                    <div class="mb-3">
                        <label for="Taninos" class="form-label">Taninos</label>
                        <input type="text" class="form-control" id="Taninos" name="Taninos" value="{{ $productoVino->Taninos }}">
                    </div>

                    <div class="mb-3">
                        <label for="Cuerpo" class="form-label">Cuerpo</label>
                        <input type="text" class="form-control" id="Cuerpo" name="Cuerpo" value="{{ $productoVino->Cuerpo }}">
                    </div>

                    <div class="mb-3">
                        <label for="Maridaje_Recomendado" class="form-label">Maridaje Recomendado</label>
                        <input type="text" class="form-control" id="Maridaje_Recomendado" name="Maridaje_Recomendado" value="{{ $productoVino->Maridaje_Recomendado }}">
                    </div>

                    <div class="mb-3">
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" value="{{ $productoVino->Precio }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                    <a href="{{ route('productosvino.show', $productoVino->IdVino) }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>