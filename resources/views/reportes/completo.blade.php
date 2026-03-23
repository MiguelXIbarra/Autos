<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte General - LUXURE APP</title>
    <style>
        /* Diseño de Hoja Membretada */
        @page {
            margin: 150px 50px 80px 50px;
        }

        header {
            position: fixed;
            top: -110px;
            left: 0;
            right: 0;
            height: 100px;
            border-bottom: 2px solid #C9A24A;
        }

        footer {
            position: fixed;
            bottom: -50px;
            left: 0;
            right: 0;
            height: 40px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            font-size: 12px;
        }

        .logo-text {
            font-weight: 900;
            font-size: 24px;
            color: #000;
            letter-spacing: -1px;
        }

        .logo-gold {
            color: #C9A24A;
        }

        .company-info {
            float: right;
            text-align: right;
            font-size: 10px;
            color: #777;
        }

        h1 {
            color: #C9A24A;
            text-transform: uppercase;
            font-size: 18px;
            letter-spacing: 3px;
            margin-bottom: 20px;
            text-align: center;
        }

        h3 {
            border-left: 4px solid #C9A24A;
            padding-left: 10px;
            margin-top: 30px;
            background: #f9f9f9;
            padding-vertical: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #f2f2f2;
            color: #C9A24A;
            text-transform: uppercase;
            font-size: 9px;
            letter-spacing: 1px;
            padding: 8px;
            border: 1px solid #ddd;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 10px;
        }

        .text-right {
            text-align: right;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <header>
        <div style="float: left;">
            <span class="logo-text">LUXURE <span class="logo-gold">APP</span></span>
        </div>
        <div class="company-info">
            Software Development & Management<br>
            Reporte Ejecutivo de Operaciones<br>
            Generado el: {{ $fecha }}
        </div>
    </header>

    <footer>
        LUXURE APP &copy; {{ date('Y') }} - Confidencial. Página <script type="text/php">echo $PAGE_NUM;</script>
    </footer>

    <main>
        <h1>Reporte General de Operaciones</h1>

        <h3>Personal y Recursos Humanos</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Ingreso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $e)
                <tr>
                    <td>{{ $e->id_empleado }}</td>
                    <td>{{ $e->nombre }}</td>
                    <td>{{ $e->puesto }}</td>
                    <td class="text-right">${{ number_format($e->salario, 2) }}</td>
                    <td>{{ date('d/m/Y', strtotime($e->fecha_ingreso)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Inventario de Vehículos</h3>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autos as $a)
                <tr>
                    <td>{{ $a->marca }}</td>
                    <td>{{ $a->modelo }}</td>
                    <td>{{ $a->anio }}</td>
                    <td class="text-right">${{ number_format($a->precio, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Cartera de Clientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $c)
                <tr>
                    <td>{{ $c->nombre }}</td>
                    <td>{{ $c->correo }}</td>
                    <td>{{ $c->telefono }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>

        <h3>Registro de Ventas</h3>
        <table>
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Cliente</th>
                    <th>Auto</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $v)
                <tr>
                    <td>#{{ str_pad($v->id_venta, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $v->cliente->nombre ?? 'N/A' }}</td>
                    <td>{{ ($v->auto->marca ?? '') . ' ' . ($v->auto->modelo ?? '') }}</td>
                    <td class="text-right">${{ number_format($v->total, 2) }}</td>
                    <td>{{ $v->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Usuarios del Sistema</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>