<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'id_auto',
        'id_cliente',
        'id_empleado',
        'fecha_venta',
        'total',
        'estatus'
    ];

    public function auto()
    {
        return $this->belongsTo(Autos::class, 'id_auto');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}