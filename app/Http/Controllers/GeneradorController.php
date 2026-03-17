<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Autos;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneradorController extends Controller
{
    public function imprimirBD()
    {
        $usuarios = User::where('estatus', 1)->get();
        $autos = Autos::where('estatus', 1)->get();
        
        $pdf = Pdf::loadView('reportes.usuarios_autos', compact('usuarios', 'autos'));
        
        return $pdf->stream('reporte_sistema.pdf');
    }
}