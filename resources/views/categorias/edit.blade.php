<!-- resources/views/categorias/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->idCategoria) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="Tipo">Tipo:</label>
            <input type="text" name="Tipo" id="Tipo" value="{{ $categoria->Tipo }}" required>
        </div>

        <div>
            <label for="Descripcion">Descripción:</label>
            <textarea name="Descripcion" id="Descripcion" required>{{ $categoria->Descripcion }}</textarea>
        </div>

        <div>
            <label for="Caracteristicas_Generales">Características Generales:</label>
            <textarea name="Caracteristicas_Generales" id="Caracteristicas_Generales" required>{{ $categoria->Caracteristicas_Generales }}</textarea>
        </div>

        <div>
            <label for="Temperatura_Servicio_Recomendada">Temperatura de Servicio Recomendada:</label>
            <textarea name="Temperatura_Servicio_Recomendada" id="Temperatura_Servicio_Recomendada" required>{{ $categoria->Temperatura_Servicio_Recomendada }}</textarea>
        </div>

        <div>
            <label for="Maridaje_General">Maridaje General:</label>
            <textarea name="Maridaje_General" id="Maridaje_General" required>{{ $categoria->Maridaje_General }}</textarea>
        </div>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('categorias.index') }}">Volver</a>
</body>
</html>