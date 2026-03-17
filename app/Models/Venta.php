<?php

namespace App\Models;

use EmptyIterator;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'cliente_id', 
        'auto_id', 
        'empleado_id', 
        'precio_final', 
        'fecha_venta', 
        'metodo_pago'
    ];

    // Relaciones para poder escribir: $venta->cliente->name
    public function cliente() { return $this->belongsTo(Clientes::class); }
    public function auto() { return $this->belongsTo(Autos::class); }
    public function empleado() { return $this->belongsTo(Empleado::class); }
}