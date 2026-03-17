<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $fillable = [
        'nombre',
        'puesto',
        'salario',
        'fecha_ingreso',
        'estatus'
    ];
}