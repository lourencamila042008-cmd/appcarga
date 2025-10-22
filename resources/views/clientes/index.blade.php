<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clientes </title>
</head>
<body>
 <h1>clientes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>apellido</th>
                <th>telefono</th>
                <th>correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $clien)
                <tr>
                    <td>{{ $clien->nombre }}</td>
                    <td>{{ $clien->apellido }}</td>
                    <td>{{ $clien->telefono }}</td>
                    <td>{{ $clien->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br><br>
     <div class="sidebar">
    <a href="{{ url('/clientes/create') }}">Agregar nuevo producto</a>
    </div>
<br><br>
</body>
</html>
 