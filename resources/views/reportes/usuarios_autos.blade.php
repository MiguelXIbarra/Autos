<!DOCTYPE html>
<html>
<head>
    <title>Reporte General del Sistema</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Proyecto AUTOS</h1>
        <p>Reporte Generado el: {{ date('d/m/Y') }}</p>
    </div>

    <h2>Listado de Usuarios Activos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Inventario de Autos</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
            <tr>
                <td>{{ $auto->marca }}</td>
                <td>{{ $auto->modelo }}</td>
                <td>${{ number_format($auto->precio, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>