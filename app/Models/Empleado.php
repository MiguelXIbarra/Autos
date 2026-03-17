<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
        use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
    'titulo',
    'autor_id',
    'auto_id',
    'portada',
    'pdf'
];

    public function autos()
    {
        return $this->belongsTo(Autos::class, 'autos_id');
    }

    public function Empleados ()
    {
        return $this->belongsTo(Empleados::class, 'empleados_id');
    }
}
