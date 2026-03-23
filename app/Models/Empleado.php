<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';

    protected $fillable = [
        'nombre',
        'puesto',
        'telefono',
        'email',
        'fecha_ingreso',
        'estatus'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_empleado');
    }
}