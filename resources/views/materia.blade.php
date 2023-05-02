<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Materia</title>
</head>
<body>
    @if ( isset($mensaje) )
        <h1>{{ $mensaje }}</h1>
    @endif
    @if ( isset($materia) )
        <h1>Estas editando la materia {{ $materia->nombre }}</h1>
    @endif
    <form action="/materia" method="POST">
        @csrf
        @isset($materia)
            {{-- Cuando estemos en una edición, no vaya por POST, vaya por PUT --}}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $materia->id }}">
        @endisset
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="{{ isset($materia) ? $materia->nombre : '' }}">
        <br>
        <label for="">Profesor</label>
        <select name="profesor_id">
            <option value="">Selecciona una opción</option>
            @foreach ($profesores as $item)
                <option value="{{ $item->id }}" {{ isset($materia) && $item->id == $materia->profesor_id ? 'selected' : '' }}>
                    {{ $item->nombre }} {{ $item->paterno }}  {{ $item->materno }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar</button>
    </form>
    @if ( !isset($materia) && $materias->count() > 0 )
        <br>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($materias as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->Profesor->nombre }} {{ $item->Profesor->paterno }} {{ $item->Profesor->materno }}</td>
                        <td>
                            <a href="/materia/{{ $item->id }}/edit">Editar</a>
                            <a href="/materia/{{ $item->id }}/destroy">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>