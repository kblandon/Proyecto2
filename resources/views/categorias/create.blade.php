<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Nueva Categoría</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div>
            <label for="Tipo">Tipo:</label>
            <input type="text" name="Tipo" id="Tipo" value="{{ old('Tipo') }}" required>
        </div>

        <div>
            <label for="Descripcion">Descripción:</label>
            <textarea name="Descripcion" id="Descripcion" required>{{ old('Descripcion') }}</textarea>
        </div>

        <div>
            <label for="Caracteristicas_Generales">Características Generales:</label>
            <textarea name="Caracteristicas_Generales" id="Caracteristicas_Generales" required>{{ old('Caracteristicas_Generales') }}</textarea>
        </div>

         <div>
            <label for="Temperatura_Servicio_Recomendada">Temperatura Servicio Recomendada:</label>
            <textarea name="Temperatura_Servicio_Recomendada" id="Temperatura_Servicio_Recomendada" required>{{ old('Temperatura_Servicio_Recomendada') }}</textarea>
        </div>

         <div>
            <label for="Maridaje_General">Maridaje General:</label>
            <textarea name="Maridaje_General" id="Maridaje_General" required>{{ old('Maridaje_General') }}</textarea>
        </div>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('categorias.index') }}">Volver</a>
</body>
</html>