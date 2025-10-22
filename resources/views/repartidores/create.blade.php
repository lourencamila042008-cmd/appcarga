<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear</title>
</head>
<body>
 @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('repartidores.store') }}" method="POST">
        @csrf 

        <div class="mb-3">
            <label for="nombre" class="form-label">Noooooombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>

          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('repartidores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

</body>
</html>