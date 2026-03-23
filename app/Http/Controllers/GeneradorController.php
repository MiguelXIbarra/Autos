<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autos;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Venta;
use App\Models\User;
use App\Models\Asset;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneradorController extends Controller
{
    public function imprimirBD()
    {
        $data = [
            'fecha'     => date('d/m/Y H:i'),
            'autos'     => Autos::where('estatus', 1)->get(),
            'clientes'  => Cliente::where('estatus', 1)->get(),
            'empleados' => Empleado::where('estatus', 1)->get(),
            'ventas'    => Venta::where('estatus', 1)->with(['auto', 'cliente'])->get(),
            'usuarios'  => User::where('estatus', 1)->get(),
            'assets'    => Asset::where('estatus', 1)->get(),
        ];

        $pdf = Pdf::loadView('reportes.completo', $data);
        
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream('Reporte_General_Autos.pdf');
    }
}