<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesor</title>
</head>
<body>
    @if ( isset($mensaje) )
        <h1>{{ $mensaje }}</h1>
    @endif
    <form action="/profesor" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="">Paterno</label>
        <input type="text" name="paterno">
        <br>
        <label for="">Materno</label>
        <input type="text" name="materno">
        <br>
        <label for="">Teléfono</label>
        <input type="text" name="telefono">
        <br>
        <label for="">Titulo</label>
        <input type="text" name="titulo">
        <br>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <table>
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Teléfono</th>
            <th>Titulo</th>
        </thead>
        <tbody>
            @foreach ($profesores as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->paterno }}</td>
                    <td>{{ $item->materno }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->titulo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>